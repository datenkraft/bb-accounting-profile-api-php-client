<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewPaymentTerms;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerPostPaymentTermsTest
 * @package Pact
 */
class AccountingProfileConsumerPostPaymentTermsTest extends AccountingProfileConsumerTest
{
    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->method = 'POST';

        $this->token = getenv('VALID_TOKEN_PAYMENT_TERMS_POST');

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = ['Content-Type' => 'application/json'];

        $this->requestData = [
            'name' => 'Payment Terms Test Post',
            'billingInterval' => 'monthly',
            'accountingProfileId' => 'f6737e9b-db43-4ff9-b441-8a8271163f63',
        ];
        $this->responseData = [
            'paymentTermsId' => $this->matcher->uuid(),
            'name' => 'Payment Terms Test Post',
            'billingInterval' => 'monthly',
            'accountingProfileId' => 'f6737e9b-db43-4ff9-b441-8a8271163f63',
        ];

        $this->path = '/payment-terms';
    }

    public function testPostPaymentTermsSuccess(): void
    {
        $this->expectedStatusCode = '201';

        $this->builder
            ->given('The request is valid, the token is valid and has a valid scope')
            ->uponReceiving('Successful POST request to /payment-terms');

        $this->beginTest();
    }

    public function testPostPaymentTermsUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized POST request to /payment-terms');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostPaymentTermsForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('VALID_TOKEN_SKU_USAGE_POST');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden POST request to /payment-terms');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostPaymentTermsBadRequest(): void
    {
        // name is not defined
        $this->requestData['name'] = '';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad POST request to /payment-terms');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPostPaymentTermsUnprocessableEntity(): void
    {
        // Invalid accountingProfileId
        $this->requestData['accountingProfileId'] = 'b88874e9-85d6-4026-be7b-29340005a2d1';

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('An Accounting Profile with accountingProfileId does not exist')
            ->uponReceiving('Unprocessable POST request to /payment-terms');

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

        $paymentTerms = (new NewPaymentTerms())
            ->setName($this->requestData['name'])
            ->setBillingInterval($this->requestData['billingInterval'])
            ->setAccountingProfileId($this->requestData['accountingProfileId']);

        return $client->postPaymentTerms($paymentTerms, Client::FETCH_RESPONSE);
    }
}
