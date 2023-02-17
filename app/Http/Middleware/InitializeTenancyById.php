<?php

namespace App\Http\Middleware;

use App\Exceptions\IdentifyTenantException;
use App\Resolvers\ResolveTenantById;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Stancl\Tenancy\Tenancy;
use Stancl\Tenancy\Middleware\IdentificationMiddleware;

class InitializeTenancyById extends IdentificationMiddleware
{
    /** @var string|null */
    public static $header = null;

    /** @var string|null */
    public static $queryParameter = null;

    /** @var callable|null */
    public static $onFail;

    /** @var Tenancy */
    protected $tenancy;

    /** @var TenantResolver */
    protected $resolver;

    public function __construct(Tenancy $tenancy, ResolveTenantById $resolver)
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
        if ($request->is('/api')) {
            $token = PersonalAccessToken::findToken($request->bearerToken());
            $user = $token->tokenable;
            return $user->id;
        } else {
            return auth()->id();
        }
    }
}
