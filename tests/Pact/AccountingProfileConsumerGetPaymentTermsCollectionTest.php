<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerGetPaymentTermsCollectionTest
 * @package Pact
 */
class AccountingProfileConsumerGetPaymentTermsCollectionTest extends AccountingProfileConsumerTest
{
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

        $this->requestData = [];
        $this->responseData = $this->matcher->eachLike(
            [
                'paymentTermsId' => $this->matcher->uuid(),
                'name' => $this->matcher->like('Payment Terms Test'),
                'billingInterval' => $this->matcher->like('monthly'),
                'accountingProfileId' => $this->matcher->uuid(),
            ]
        );

        $this->path = '/payment-terms';
    }

    public function testGetPaymentTermsCollectionSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful GET request to /payment-terms');

        $this->beginTest();
    }

    public function testGetPaymentTermsCollectionUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized GET request to /payment-terms');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testGetPaymentTermsCollectionForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden GET request to /payment-terms');

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

        return $client->getPaymentTermsCollection(Client::FETCH_RESPONSE);
    }
}
