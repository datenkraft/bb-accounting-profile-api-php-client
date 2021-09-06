<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class PaymentTerms
{
    /**
     * Payment Terms Id
     *
     * @var string
     */
    protected $paymentTermsId;
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
     * Payment Terms Id
     *
     * @return string
     */
    public function getPaymentTermsId() : string
    {
        return $this->paymentTermsId;
    }
    /**
     * Payment Terms Id
     *
     * @param string $paymentTermsId
     *
     * @return self
     */
    public function setPaymentTermsId(string $paymentTermsId) : self
    {
        $this->paymentTermsId = $paymentTermsId;
        return $this;
    }
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
        $this->accountingProfileId = $accountingProfileId;
        return $this;
    }
}