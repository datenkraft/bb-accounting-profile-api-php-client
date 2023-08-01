<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class DeleteAccountingProfileConflictError
{
    /**
     * Code
     *
     * @var string
     */
    protected $code;
    /**
     * Message
     *
     * @var string
     */
    protected $message;
    /**
     * References
     *
     * @var ErrorReferencesItem[]
     */
    protected $references;
    /**
     * Extra
     *
     * @var DeleteAccountingProfileConflictErrorextra
     */
    protected $extra;
    /**
     * Code
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
    /**
     * Code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code) : self
    {
        $this->code = $code;
        return $this;
    }
    /**
     * Message
     *
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * Message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message) : self
    {
        $this->message = $message;
        return $this;
    }
    /**
     * References
     *
     * @return ErrorReferencesItem[]
     */
    public function getReferences() : array
    {
        return $this->references;
    }
    /**
     * References
     *
     * @param ErrorReferencesItem[] $references
     *
     * @return self
     */
    public function setReferences(array $references) : self
    {
        $this->references = $references;
        return $this;
    }
    /**
     * Extra
     *
     * @return DeleteAccountingProfileConflictErrorextra
     */
    public function getExtra() : DeleteAccountingProfileConflictErrorextra
    {
        return $this->extra;
    }
    /**
     * Extra
     *
     * @param DeleteAccountingProfileConflictErrorextra $extra
     *
     * @return self
     */
    public function setExtra(DeleteAccountingProfileConflictErrorextra $extra) : self
    {
        $this->extra = $extra;
        return $this;
    }
}