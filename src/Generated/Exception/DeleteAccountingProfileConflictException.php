<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Exception;

class DeleteAccountingProfileConflictException extends ConflictException
{
    private $deleteAccountingProfileConflictErrorResponse;
    public function __construct(\Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\DeleteAccountingProfileConflictErrorResponse $deleteAccountingProfileConflictErrorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->deleteAccountingProfileConflictErrorResponse = $deleteAccountingProfileConflictErrorResponse;
    }
    public function getDeleteAccountingProfileConflictErrorResponse()
    {
        return $this->deleteAccountingProfileConflictErrorResponse;
    }
}