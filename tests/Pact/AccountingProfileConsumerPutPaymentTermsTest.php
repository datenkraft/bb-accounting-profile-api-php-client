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
 * Class AccountingProfileConsumerPutPaymentTermsTest
 * @package Pact
 */
class AccountingProfileConsumerPutPaymentTermsTest extends AccountingProfileConsumerTest
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

        $this->method = 'PUT';

        $this->requestHeaders = [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
        $this->responseHeaders = [
            'Content-Type' => 'application/json'
        ];

        $this->paymentTermsIdValid = '200dffc8-cae9-4ad2-9406-376ddbacfdee';
        $this->paymentTermsIdInvalid = 'dd7c5031-9a4e-40fd-aa9f-2f97cc74f295';

        $this->paymentTermsId = $this->paymentTermsIdValid;

        $this->requestData = [
            'name' => 'Payment Terms Test Put 2',
            'billingInterval' => 'weekly',
            'accountingProfileId' => '6f240614-c760-4085-821e-f6612bccb2b5',
        ];
        $this->responseData = [
            'paymentTermsId' => $this->paymentTermsId,
            'name' => 'Payment Terms Test Put 2',
            'billingInterval' => 'weekly',
            'accountingProfileId' => '6f240614-c760-4085-821e-f6612bccb2b5',
        ];

        $this->path = '/payment-terms/' . $this->paymentTermsId;
    }

    public function testPutPaymentTermsSuccess(): void
    {
        $this->expectedStatusCode = '200';

        $this->builder
            ->given(
                'Payment Terms with paymentTermsId exist, ' .
                'the request is valid, the token is valid and has a valid scope'
            )
            ->uponReceiving('Successful PUT request to /payment-terms/{paymentTermsId}');

        $this->beginTest();
    }

    public function testPutPaymentTermsUnauthorized(): void
    {
        // Invalid token
        $this->token = 'invalid_token';
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 401
        $this->expectedStatusCode = '401';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The token is invalid')
            ->uponReceiving('Unauthorized PUT request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutPaymentTermsForbidden(): void
    {
        // Token with invalid scope
        $this->token = getenv('CONTRACT_TEST_CLIENT_WITHOUT_PERMISSIONS_TOKEN');
        $this->requestHeaders['Authorization'] = 'Bearer ' . $this->token;

        // Error code in response is 403
        $this->expectedStatusCode = '403';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request is valid, the token is valid with an invalid scope')
            ->uponReceiving('Forbidden PUT request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutPaymentTermsNotFound(): void
    {
        // Path with paymentTermsId for non existent paymentTerms
        $this->paymentTermsId = $this->paymentTermsIdInvalid;
        $this->path = '/payment-terms/' . $this->paymentTermsId;

        // Error code in response is 404
        $this->expectedStatusCode = '404';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('Payment Terms with paymentTermsId do not exist')
            ->uponReceiving('Not Found PUT request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutPaymentTermsBadRequest(): void
    {
        // name is not defined
        $this->requestData['name'] = '';

        // Error code in response is 400
        $this->expectedStatusCode = '400';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('The request body is invalid or missing')
            ->uponReceiving('Bad PUT request to /payment-terms/{paymentTermsId}');

        $this->responseData = $this->errorResponse;
        $this->beginTest();
    }

    public function testPutPaymentTermsUnprocessableEntity(): void
    {
        // Invalid accountingProfileId
        $this->requestData['accountingProfileId'] = 'b88874e9-85d6-4026-be7b-29340005a2d1';

        // Error code in response is 422
        $this->expectedStatusCode = '422';
        $this->errorResponse['errors'][0]['code'] = strval($this->expectedStatusCode);

        $this->builder
            ->given('An Accounting Profile for accountingProfileId does not exist')
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

        return $client->putPaymentTerms($this->paymentTermsId, $paymentTerms, Client::FETCH_RESPONSE);
    }
}
