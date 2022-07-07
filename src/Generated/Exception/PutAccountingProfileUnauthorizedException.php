<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception;

class PutAccountingProfileUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Unauthorized');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}