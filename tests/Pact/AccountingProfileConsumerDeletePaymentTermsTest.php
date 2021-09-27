<?php

namespace Pact;

use Datenkraft\Backbone\Client\AccountingProfileApi\Client;
use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\ConfigException;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountingProfileConsumerDeletePaymentTermsTest
 * @package Pact
 */
class AccountingProfileConsumerDeletePaymentTermsTest extends AccountingProfileConsumerTest
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

        $this->method = 'DELETE';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $this->responseHeaders = [];

        $this->paymentTermsIdValid = '7ce1200a-3551-40a6-9712-c98fe5a22551';
        $this->paymentTermsIdInvalid = 'dd7c5031-9a4e-40fd-aa9f-2f97cc74f295';

        $this->paymentTermsId = $this->paymentTermsIdValid;

        $this->requestData = [];
        $this->responseData = [];

        $this->path = '/payment-terms/' . $this->paymentTermsId;
    }

    public function testDeletePaymentTermsSuccess(): void
    {
        $this->expectedStatusCode = '204';

        $this->builder
            ->given(
                'Payment Terms with paymentTermsId exist, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful DELETE request to /payment-terms/{paymentTermsId}');

        $this->beginTest();
    }

    public function testDeletePaymentTermsUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized DELETE request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeletePaymentTermsForbidden(): void
    {
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden DELETE request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeletePaymentTermsNotFound(): void
    {
        // Path with paymentTermsId for non existent paymentTerms
        $this->paymentTermsId = $this->paymentTermsIdInvalid;
        $this->path = '/payment-terms/' . $this->paymentTermsId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('Payment Terms with paymentTermsId do not exist')
            ->uponReceiving('Not Found DELETE request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testDeletePaymentTermsBadRequest(): void
    {
        // invalid uuid query param paymentTermsId
        $this->paymentTermsId = 'non_uid';
        $this->path = '/payment-terms/' . $this->paymentTermsId;

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request query is invalid or missing')
            ->uponReceiving('Bad DELETE request to /payment-terms/{paymentTermsId}');

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

        return $client->deletePaymentTerms($this->paymentTermsId, Client::FETCH_RESPONSE);
    }
}
