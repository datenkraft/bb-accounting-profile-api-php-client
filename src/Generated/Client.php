<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated;

class Client extends \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile[]|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAccountingProfileCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetAccountingProfileCollection(), $fetch);
    }
    /**
     * Add a new AccountingProfile
     *
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postAccountingProfile(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\PostAccountingProfile($requestBody), $fetch);
    }
    /**
     * Delete an Accounting Profile
     *
     * @param string $accountingProfileId Accounting Profile Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileConflictException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeleteAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deleteAccountingProfile(string $accountingProfileId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\DeleteAccountingProfile($accountingProfileId), $fetch);
    }
    /**
     * Get an Accounting Profile by accountingProfileId
     *
     * @param string $accountingProfileId Accounting Profile Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAccountingProfile(string $accountingProfileId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetAccountingProfile($accountingProfileId), $fetch);
    }
    /**
     * Update an Accounting Profile
     *
     * @param string $accountingProfileId Accounting Profile Id
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutAccountingProfileNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function putAccountingProfile(string $accountingProfileId, \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\PutAccountingProfile($accountingProfileId, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleCollectionEndpointBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleCollectionEndpointUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleCollectionEndpointForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleCollectionEndpointInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AuthRoleResource[]|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAuthRoleCollectionEndpoint(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetAuthRoleCollectionEndpoint(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleIdentityCollectionEndpointBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleIdentityCollectionEndpointUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleIdentityCollectionEndpointForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuthRoleIdentityCollectionEndpointInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AuthRoleIdentityResource[]|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAuthRoleIdentityCollectionEndpoint(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetAuthRoleIdentityCollectionEndpoint(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointConflictException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointUnprocessableEntityException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAuthRoleIdentityCollectionEndpointInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AuthRoleIdentityResource[]|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postAuthRoleIdentityCollectionEndpoint(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\PostAuthRoleIdentityCollectionEndpoint(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetOpenApiInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApi(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetOpenApi(), $fetch);
    }
    /**
     * Get the openapi documentation in the specified format (yaml or json, fallback is json)
     *
     * @param string $format Openapi file format
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetOpenApiInFormatInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getOpenApiInFormat(string $format, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetOpenApiInFormat($format), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PaymentTerms[]|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getPaymentTermsCollection(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetPaymentTermsCollection(), $fetch);
    }
    /**
     * Add new Payment Terms
     *
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewPaymentTerms $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostPaymentTermsUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostPaymentTermsForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostPaymentTermsBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostPaymentTermsInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PaymentTerms|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function postPaymentTerms(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewPaymentTerms $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\PostPaymentTerms($requestBody), $fetch);
    }
    /**
     * Delete Payment Terms
     *
     * @param string $paymentTermsId Payment Terms Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeletePaymentTermsUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeletePaymentTermsForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeletePaymentTermsNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeletePaymentTermsBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\DeletePaymentTermsInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function deletePaymentTerms(string $paymentTermsId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\DeletePaymentTerms($paymentTermsId), $fetch);
    }
    /**
     * Get Payment Terms by paymentTermsId
     *
     * @param string $paymentTermsId Payment Terms Id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetPaymentTermsInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PaymentTerms|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getPaymentTerms(string $paymentTermsId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\GetPaymentTerms($paymentTermsId), $fetch);
    }
    /**
     * Update Payment Terms
     *
     * @param string $paymentTermsId Payment Terms Id
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewPaymentTerms $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutPaymentTermsUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutPaymentTermsForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutPaymentTermsNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutPaymentTermsBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PutPaymentTermsInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PaymentTerms|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse|\Psr\Http\Message\ResponseInterface
     */
    public function putPaymentTerms(string $paymentTermsId, \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewPaymentTerms $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint\PutPaymentTerms($paymentTermsId, $requestBody), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('/UNDEFINED');
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}