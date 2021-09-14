<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class DeleteAccountingProfileConflictErrorResponse
{
    /**
     * errors
     *
     * @var DeleteAccountingProfileConflictError[]
     */
    protected $errors;
    /**
     * errors
     *
     * @return DeleteAccountingProfileConflictError[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * errors
     *
     * @param DeleteAccountingProfileConflictError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}