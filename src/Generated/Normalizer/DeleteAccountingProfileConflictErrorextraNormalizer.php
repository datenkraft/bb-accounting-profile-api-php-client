<?php

namespace Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class DeleteAccountingProfileConflictErrorextraNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\DeleteAccountingProfileConflictErrorextra';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\DeleteAccountingProfileConflictErrorextra';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Model\DeleteAccountingProfileConflictErrorextra();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('paymentTerms', $data)) {
            $values = array();
            foreach ($data['paymentTerms'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\PaymentTerms', 'json', $context);
            }
            $object->setPaymentTerms($values);
        }
        if (\array_key_exists('projects', $data)) {
            $values_1 = array();
            foreach ($data['projects'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Datenkraft\\Backbone\\Client\\AccountingProfileApi\\Generated\\Model\\Project', 'json', $context);
            }
            $object->setProjects($values_1);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getPaymentTerms()) {
            $values = array();
            foreach ($object->getPaymentTerms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['paymentTerms'] = $values;
        }
        if (null !== $object->getProjects()) {
            $values_1 = array();
            foreach ($object->getProjects() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['projects'] = $values_1;
        }
        return $data;
    }
}