<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception;

class PostAuthRoleIdentityCollectionEndpointForbiddenException extends ForbiddenException
{
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Forbidden', 403);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}