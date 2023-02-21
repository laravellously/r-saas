<?php

namespace App\Resolvers;

use App\Exceptions\IdentifyTenantException;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Resolvers\Contracts\CachedTenantResolver;

class ResolveTenantByAPIKey extends CachedTenantResolver
{
    /** @var bool */
    public static $shouldCache = false;

    /** @var int */
    public static $cacheTTL = 3600; // seconds

    /** @var string|null */
    public static $cacheStore = null; // default

    public function resolveWithoutCache(...$args): Tenant
    {
        $payload = $args[0];

        /** @var Tenant|null $tenant */

        if (is_null($payload)) throw new IdentifyTenantException($payload);

        $tenant = config('tenancy.tenant_model')::where('api_key', $payload)->first();

        if ($tenant) return $tenant;

        throw new IdentifyTenantException($payload);
    }

    public function getArgsForTenant(Tenant $tenant): array
    {
        return [
            [$tenant->api_key],
        ];
    }
}
