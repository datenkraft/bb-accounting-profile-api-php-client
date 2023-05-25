<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class NewPaymentTerms extends \ArrayObject
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
     * Name
     *
     * @var string
     */
    protected $name;
    /**
     * Billing Interval
     *
     * @var string
     */
    protected $billingInterval;
    /**
     * Accounting Profile Id
     *
     * @var string
     */
    protected $accountingProfileId;
    /**
     * Name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * Name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Billing Interval
     *
     * @return string
     */
    public function getBillingInterval() : string
    {
        return $this->billingInterval;
    }
    /**
     * Billing Interval
     *
     * @param string $billingInterval
     *
     * @return self
     */
    public function setBillingInterval(string $billingInterval) : self
    {
        $this->initialized['billingInterval'] = true;
        $this->billingInterval = $billingInterval;
        return $this;
    }
    /**
     * Accounting Profile Id
     *
     * @return string
     */
    public function getAccountingProfileId() : string
    {
        return $this->accountingProfileId;
    }
    /**
     * Accounting Profile Id
     *
     * @param string $accountingProfileId
     *
     * @return self
     */
    public function setAccountingProfileId(string $accountingProfileId) : self
    {
        $this->initialized['accountingProfileId'] = true;
        $this->accountingProfileId = $accountingProfileId;
        return $this;
    }
}