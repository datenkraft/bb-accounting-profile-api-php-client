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
 * Class AccountingProfileConsumerPutAccountingProfileTest
 * @package Pact
 */
class AccountingProfileConsumerPutAccountingProfileTest extends AccountingProfileConsumerTest
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

        $this->method = 'PUT';

        $this->token = getenv('VALID_TOKEN_ACCOUNTING_PROFILE_PUT');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->accountingProfileIdValid = '6f240614-c760-4085-821e-f6612bccb2b5';
        $this->accountingProfileIdInvalid = 'b88874e9-85d6-4026-be7b-29340005a2d1';

        $this->accountingProfileId = $this->accountingProfileIdValid;

        $this->requestData = [
            'name' => 'Accounting Profile Test Put 2'
        ];
        $this->responseData = [
            'accountingProfileId' => $this->accountingProfileId,
            'name' => $this->requestData['name'],
        ];

        $this->path = '/accounting-profile/' . $this->accountingProfileId;
    }

    public function testPutAccountingProfileSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'A Accounting Profile with accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful PUT request to /accounting-profile/{accountingProfileId}');

        $this->beginTest();
    }

    public function testPutAccountingProfileUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PUT request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutAccountingProfileForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden PUT request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutAccountingProfileNotFound(): void
    {
        // Path with accountingProfileId for non existent customer
        $this->accountingProfileId = $this->accountingProfileIdInvalid;
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A Accounting Profile with accountingProfileId does not exist'
            )
            ->uponReceiving('Not Found PUT request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutAccountingProfileBadRequest(): void
    {
        // name is not defined
        $this->requestData['name'] = '';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PUT request to /accounting-profile/{accountingProfileId}');

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

        return $client->putAccountingProfile($this->accountingProfileId, $accountingProfile, Client::FETCH_RESPONSE);
    }
}
