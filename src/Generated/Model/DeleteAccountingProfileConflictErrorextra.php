<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class DeleteAccountingProfileConflictErrorextra
{
    /**
     * Payment Terms
     *
     * @var PaymentTerms[]
     */
    protected $paymentTerms;
    /**
     * Projects
     *
     * @var Project[]
     */
    protected $projects;
    /**
     * Payment Terms
     *
     * @return PaymentTerms[]
     */
    public function getPaymentTerms() : array
    {
        return $this->paymentTerms;
    }
    /**
     * Payment Terms
     *
     * @param PaymentTerms[] $paymentTerms
     *
     * @return self
     */
    public function setPaymentTerms(array $paymentTerms) : self
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }
    /**
     * Projects
     *
     * @return Project[]
     */
    public function getProjects() : array
    {
        return $this->projects;
    }
    /**
     * Projects
     *
     * @param Project[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects) : self
    {
        $this->projects = $projects;
        return $this;
    }
}