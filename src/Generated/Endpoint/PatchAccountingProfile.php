<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint;

class PatchAccountingProfile extends \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\Endpoint
{
    protected $accountingProfileId;
    /**
     * Updated one or more fields of an Accounting Profile
     *
     * @param string $accountingProfileId Accounting Profile Id
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PatchAccountingProfile $requestBody 
     */
    public function __construct(string $accountingProfileId, \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PatchAccountingProfile $requestBody)
    {
        $this->accountingProfileId = $accountingProfileId;
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'PATCH';
    }
    public function getUri() : string
    {
        return str_replace(array('{accountingProfileId}'), array($this->accountingProfileId), '/accounting-profile/{accountingProfileId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\PatchAccountingProfile) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileNotFoundException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AccountingProfile', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileNotFoundException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PatchAccountingProfileInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
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