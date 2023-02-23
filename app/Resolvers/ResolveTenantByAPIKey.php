<?php

namespace App\Resolvers;

use App\Exceptions\IdentifyTenantException;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Resolvers\Contracts\CachedTenantResolver;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

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

        if (is_null($tenant)) {
            throw new HttpResponseException(response()->json([
                'message' => 'INVALID_API_KEY'
            ], Response::HTTP_FORBIDDEN));
        } else {
            return $tenant;
        }

    }

    public function getArgsForTenant(Tenant $tenant): array
    {
        return [
            [$tenant->api_key],
        ];
    }
}
