<?php

declare(strict_types=1);

namespace Datenkraft\Backbone\Client\AccountingProfileApi;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\BaseApi\Exceptions\AuthException;

class Client extends \Datenkraft\Backbone\Client\AccountingProfileApi\Generated\Client
{
    /**
     * @param ClientFactory $clientFactory
     * @param string|null $endpointUrl
     * @return static
     * @throws AuthException
     */
    public static function createWithFactory(ClientFactory $clientFactory, string $endpointUrl = null): self
    {
        $endpointUrl = $endpointUrl ?? getenv('X_DATENKRAFT_ACCOUNTING_PROFILE_API_URL') ?: null;
        return $clientFactory->createClient(static::class, $endpointUrl);
    }
}
