<?php

namespace App\Http\Middleware;

use App\Exceptions\IdentifyTenantException;
use App\Resolvers\ResolveTenantByAPIKey;
use Closure;
use Illuminate\Http\Request;
// use Laravel\Sanctum\PersonalAccessToken;
use Stancl\Tenancy\Tenancy;
use Stancl\Tenancy\Middleware\IdentificationMiddleware;

class InitializeTenancyByAPIKey extends IdentificationMiddleware
{
    /** @var string|null */
    public static $header = 'X-API-Key';

    /** @var callable|null */
    public static $onFail;

    /** @var Tenancy */
    protected $tenancy;

    /** @var TenantResolver */
    protected $resolver;

    public function __construct(Tenancy $tenancy, ResolveTenantByAPIKey $resolver)
    {
        $this->tenancy = $tenancy;
        $this->resolver = $resolver;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->getPayload($request) === null) {
            throw new IdentifyTenantException("NONE");
        }

        if ($request->method() !== 'OPTIONS') {
            return $this->initializeTenancy($request, $next, $this->getPayload($request));
        }

        return $next($request);
    }

    protected function getPayload(Request $request): int|string|null
    {
        $tenant = null;
        if (static::$header && $request->hasHeader(static::$header)) {
            $tenant = $request->header(static::$header);
        }

        return $tenant;

        // if ($request->is('/api')) {
        //     $token = PersonalAccessToken::findToken($request->bearerToken());
        //     $user = $token->tokenable;
        //     return $user->id;
        // } else {
        //     return auth()->id();
        // }
    }
}
