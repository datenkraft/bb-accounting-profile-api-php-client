<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerGetPaymentTermsTest
 * @package Pact
 */
class AccountingProfileConsumerGetPaymentTermsTest extends AccountingProfileConsumerTest
{
    protected string $paymentTermsId;
    protected string $paymentTermsIdValid;
    protected string $paymentTermsIdInvalid;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'GET';

        $this->token = getenv('VALID_TOKEN_PAYMENT_TERMS_GET');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->paymentTermsIdValid = '8c739fcb-8726-445a-8270-a9b514d9de63';
        $this->paymentTermsIdInvalid = 'dd7c5031-9a4e-40fd-aa9f-2f97cc74f295';

        $this->paymentTermsId = $this->paymentTermsIdValid;

        $this->requestData = [];
        $this->responseData = [
            'paymentTermsId' => $this->paymentTermsId,
            'name' => 'Payment Terms Test Get',
            'billingInterval' => 'monthly',
            'accountingProfileId' => 'f6737e9b-db43-4ff9-b441-8a8271163f63',
        ];

        $this->path = '/payment-terms/' . $this->paymentTermsId;
    }

    public function testGetPaymentTermsSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'Payment Terms with paymentTermsId exist, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful GET request to /payment-terms/{paymentTermsId}');

        $this->beginTest();
    }

    public function testGetPaymentTermsUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetPaymentTermsForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetPaymentTermsNotFound(): void
    {
        // Path with paymentTermsId for non existent paymentTerms
        $this->paymentTermsId = $this->paymentTermsIdInvalid;
        $this->path = '/payment-terms/' . $this->paymentTermsId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('Payment Terms with paymentTermsId do not exist')
            ->uponReceiving('Not Found GET request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetPaymentTermsBadRequest(): void
    {
        // invalid uuid query param paymentTermsId
        $this->paymentTermsId = 'non_uid';
        $this->path = '/payment-terms/' . $this->paymentTermsId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request query is invalid or missing')
            ->uponReceiving('Bad GET request to /payment-terms/{paymentTermsId}');

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

        return $client->getPaymentTerms($this->paymentTermsId, Client::FETCH_RESPONSE);
    }
}
