<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint;

class GetAuditLogCollection extends \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Get the audit log.
     *
     * @param array $queryParameters {
     *     @var int $page The page to read. Default is the first page.
     *     @var int $pageSize The maximum size per page is 100. Default is 100.
     *     @var string $filter[endpoint] A filter for restricting the audit log to a endpoint.
     *     @var string $filter[version] A filter for restricting the audit log to a endpoint version.
     *     @var mixed $filter[identifier] A filter for querying actions for a identifier.
     * }
     */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/audit-log';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('page', 'pageSize', 'filter[endpoint]', 'filter[version]', 'filter[identifier]'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('page', array('int'));
        $optionsResolver->setAllowedTypes('pageSize', array('int'));
        $optionsResolver->setAllowedTypes('filter[endpoint]', array('string'));
        $optionsResolver->setAllowedTypes('filter[version]', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AuditLogCollection|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuditLogCollection', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\GetAuditLogCollectionInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'));
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json');
        }
        throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array('oAuthAuthorization', 'bearerAuth');
    }
}