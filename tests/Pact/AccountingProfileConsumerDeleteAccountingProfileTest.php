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
    protected string $accountingProfileIdInvalid;

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

        $this->accountingProfileIdValid = '2becace9-dd9a-4770-97e5-06e8f47786d6';
        $this->accountingProfileIdInvalid = 'b88874e9-85d6-4026-be7b-29340005a2d1';

        $this->accountingProfileId = $this->accountingProfileIdValid;

        $this->requestData = [];
        $this->responseData = null;

        $this->path = '/accounting-profile/' . $this->accountingProfileId;
    }

    public function testDeleteAccountingProfileSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given(
                'An Accounting Profile with accountingProfileId exists, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful DELETE request to /accounting-profile/{accountingProfileId}');

        $this->beginTest();
    }

    public function testDeleteAccountingProfileUnauthorized(): void
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

    public function testDeleteAccountingProfileForbidden(): void
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

    public function testDeleteAccountingProfileNotFound(): void
    {
        // Path with accountingProfileId for non existent accountingProfile
        $this->accountingProfileId = $this->accountingProfileIdInvalid;
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('An Accounting Profile with accountingProfileId does not exist')
            ->uponReceiving('Not Found DELETE request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeleteAccountingProfileBadRequest(): void
    {
        // invalid uuid query param accountingProfileId
        $this->accountingProfileId = 'non_uid';
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request query is invalid or missing')
            ->uponReceiving('Bad DELETE request to /accounting-profile/{accountingProfileId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    /**
     * @throws Exception
     */
    public function testDeleteAccountingProfileConflict(): void
    {
        // accountingProfileId for Accounting Profile with existing Payment Terms
        $this->accountingProfileId = 'f6737e9b-db43-4ff9-b441-8a8271163f63';
        $this->path = '/accounting-profile/' . $this->accountingProfileId;

        // Error code in response is 409
        $this->expectedStatusCode = '409';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);
        $this->errorResponse['errors'][0]['extra'] = [
            'paymentTerms' => $this->matcher->eachLike(
                [
                    'paymentTermsId' => $this->matcher->uuid(),
                    'name' => $this->matcher->like('Payment Terms Test'),
                    'billingInterval' => $this->matcher->like('monthly'),
                    'accountingProfileId' => $this->matcher->uuid(),
                ]
            )
        ];

        $this->builder
            ->given('Payment Terms exist for the Account Profile with accountingProfileId')
            ->uponReceiving('Conflicted DELETE request to /accounting-profile/{accountingProfileId}');

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
