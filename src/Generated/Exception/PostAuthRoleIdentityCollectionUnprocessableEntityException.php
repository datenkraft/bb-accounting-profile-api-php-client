<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception;

class PostAuthRoleIdentityCollectionUnprocessableEntityException extends UnprocessableEntityException
{
    /**
     * @var \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Unprocessable Entity');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}