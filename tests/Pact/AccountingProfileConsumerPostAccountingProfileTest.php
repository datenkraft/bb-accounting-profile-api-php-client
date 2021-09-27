<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerPostAccountingProfileTest
 * @package Pact
 */
class AccountingProfileConsumerPostAccountingProfileTest extends AccountingProfileConsumerTest
{
    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = ['Content-Type' => 'application/json'];

        $this->requestData = [
            'name' => 'Accounting Profile Test Post'
        ];
        $this->responseData = [
            'accountingProfileId' => $this->matcher->uuid(),
            'name' => $this->requestData['name'],
        ];

        $this->path = '/accounting-profile';
    }

    public function testPostAccountingProfileSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /accounting-profile');

        $this->beginTest();
    }

    public function testPostAccountingProfileUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /accounting-profile');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostAccountingProfileForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /accounting-profile');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostAccountingProfileBadRequest(): void
    {
        // name is not defined
        $this->requestData['name'] = '';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /accounting-profile');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @return ResponseInterface
     * @throws ConfigException
     * @throws AuthException
     */
    protected function doClientRequest(): ResponseInterface
    {
        $factory = new ClientFactory(
            ['clientId' => 'test', 'clientSecret' => 'test', 'oAuthTokenUrl' => 'test', 'oAuthScopes' => ['test']]
        );
        $factory->setToken($this->token);
        $client = Client::createWithFactory($factory, $this->config->getBaseUri());

        $accountingProfile = (new NewAccountingProfile())
            ->setName($this->requestData['name']);

        return $client->postAccountingProfile($accountingProfile, Client::FETCH_RESPONSE);
    }
}
