<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerDeleteAccountingProfileTest
 * @package Pact
 */
class AccountingProfileConsumerDeleteAccountingProfileTest extends AccountingProfileConsumerTest
{
    protected string $accountingProfileId;
    protected string $accountingProfileIdValid;
    protected string $accountingProfileIdInValid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'DELETE';

        $this->token = getenv('VALID_TOKEN_ACCOUNTING_PROFILE_DELETE');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [];

        $this->accountingProfileIdValid = 'accountingProfileId_test_delete';
        $this->accountingProfileIdInValid = 'accountingProfileId_test_invalid';

        $this->accountingProfileId = $this->accountingProfileIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/accounting-profile/' . $this->accountingProfileId;
    }

    public function testAccountingProfileSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given(
                'A Accounting Profile with accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful DELETE request to /accounting-profile/{accountingProfileId}');

        $this->beginTest();
    }

    public function testAccountingProfileUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testAccountingProfileForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testAccountingProfileNotFound(): void
    {
        // Path with accountingProfileId for non existent accountingProfile
        $this->accountingProfileId = $this->accountingProfileIdInValid;
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given(
                'A Accounting Profile with profileAccountId does not exist'
            )
            ->uponReceiving('Not Found DELETE request to /accounting-profile/{accountingProfileId}');

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

        return $client->deleteAccountingProfile($this->accountingProfileId, Client::FETCH_RESPONSE);
    }
}
