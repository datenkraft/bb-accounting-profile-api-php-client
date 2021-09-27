<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerGetAccountingProfileTest
 * @package Pact
 */
class AccountingProfileConsumerGetAccountingProfileTest extends AccountingProfileConsumerTest
{
    protected string $accountingProfileId;
    protected string $accountingProfileIdValid;
    protected string $accountingProfileIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->accountingProfileIdValid = 'f6737e9b-db43-4ff9-b441-8a8271163f63';
        $this->accountingProfileIdInvalid = 'b88874e9-85d6-4026-be7b-29340005a2d1';

        $this->accountingProfileId = $this->accountingProfileIdValid;

        $this->requestData = [];
        $this->responseData = [
            'accountingProfileId' => $this->accountingProfileId,
            'name' => 'Accounting Profile Test Get'
        ];

        $this->path = '/accounting-profile/' . $this->accountingProfileId;
    }

    public function testGetAccountingProfileSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'An Accounting Profile with accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /accounting-profile/{accountingProfileId}');

        $this->beginTest();
    }

    public function testGetAccountingProfileUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetAccountingProfileForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetAccountingProfileNotFound(): void
    {
        // Path with accountingProfileId for non existent accountingProfile
        $this->accountingProfileId = $this->accountingProfileIdInvalid;
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('An Accounting Profile with accountingProfileId does not exist')
            ->uponReceiving('Not Found GET request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetAccountingProfileBadRequest(): void
    {
        // invalid uuid query param accountingProfileId
        $this->accountingProfileId = 'non_uid';
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request query is invalid or missing')
            ->uponReceiving('Bad GET request to /accounting-profile/{accountingProfileId}');

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

        return $client->getAccountingProfile($this->accountingProfileId, Client::FETCH_RESPONSE);
    }
}
