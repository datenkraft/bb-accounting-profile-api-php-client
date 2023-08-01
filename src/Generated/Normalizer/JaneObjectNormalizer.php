<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Normalizer;

use Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    protected $normalizers = array('Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AccountingProfile' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AccountingProfileNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuditLog' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuditLogNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuditLogCollection' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuditLogCollectionNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuthPermissionResource' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuthPermissionResourceNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuthPermissionRoleResource' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuthPermissionRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuthRoleIdentityResource' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuthRoleIdentityResourceNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\AuthRoleResource' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\AuthRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\BaseAccountingProfile' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\BaseAccountingProfileNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\BasePaymentTerms' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\BasePaymentTermsNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\Collection' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\CollectionNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\CollectionPagination' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\CollectionPaginationNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\DeleteAccountingProfileConflictError' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\DeleteAccountingProfileConflictErrorNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\DeleteAccountingProfileConflictErrorextra' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\DeleteAccountingProfileConflictErrorextraNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\DeleteAccountingProfileConflictErrorResponse' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\DeleteAccountingProfileConflictErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\Error' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\ErrorNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorReferencesItem' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\ErrorReferencesItemNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\ErrorResponse' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\ErrorResponseNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\Information' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\InformationNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\InformationResponse' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\InformationResponseNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\NewAccountingProfile' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\NewAccountingProfileNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\NewAuthRoleResource' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\NewAuthRoleResourceNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\NewPaymentTerms' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\NewPaymentTermsNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\PatchAccountingProfile' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\PatchAccountingProfileNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\PatchPaymentTerms' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\PatchPaymentTermsNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\PaymentTerms' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\PaymentTermsNormalizer', 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\Project' => 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Normalizer\\ProjectNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}