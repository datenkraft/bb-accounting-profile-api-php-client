<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Endpoint;

class PostAccountingProfile extends \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\BaseEndpoint implements \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\Endpoint
{
    /**
     * Add a new AccountingProfile
     *
     * @param \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody 
     */
    public function __construct(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile $requestBody)
    {
        $this->body = $requestBody;
    }
    use \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/accounting-profile';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\NewAccountingProfile) {
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
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileBadRequestException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileUnauthorizedException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileForbiddenException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileInternalServerErrorException
     * @throws \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\UnexpectedStatusCodeException
     *
     * @return \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\AccountingProfile|\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AccountingProfile', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileBadRequestException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileUnauthorizedException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileForbiddenException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception\PostAccountingProfileInternalServerErrorException($serializer->deserialize($body, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse', 'json'), $response);
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