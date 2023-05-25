<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class DeleteAccountingProfileConflictError extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
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
        $this->initialized['code'] = true;
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
        $this->initialized['message'] = true;
        $this->message = $message;
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
        $this->initialized['extra'] = true;
        $this->extra = $extra;
        return $this;
    }
}