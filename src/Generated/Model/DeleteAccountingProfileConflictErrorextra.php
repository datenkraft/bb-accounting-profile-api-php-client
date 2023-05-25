<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model;

class DeleteAccountingProfileConflictErrorextra extends \ArrayObject
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
     * Payment Terms
     *
     * @var mixed[][]
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
     * @return mixed[][]
     */
    public function getPaymentTerms() : array
    {
        return $this->paymentTerms;
    }
    /**
     * Payment Terms
     *
     * @param mixed[][] $paymentTerms
     *
     * @return self
     */
    public function setPaymentTerms(array $paymentTerms) : self
    {
        $this->initialized['paymentTerms'] = true;
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
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
}