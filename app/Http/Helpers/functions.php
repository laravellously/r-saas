<?php

use App\Models\User;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

function isActiveNav($route): bool
{
    return request()->routeIs($route);
}

function is_active_nav_class($route): string
{
    if (request()->routeIs($route)) {
        return 'bg-cyan-800 text-white';
    } else {
        return 'text-cyan-100 hover:text-white hover:bg-cyan-600';
    }
}

function random_string($length = 12, $alphanum = false)
{
    $characters = $alphanum ? 'abcdefghjkmnprsuvyz123456789' : '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function tenant_auth_check()
{
    if(is_null(request()->bearerToken())) return false;
    if(is_null(getUserFromToken(request()->bearerToken()))) return false;
    return true;
}

function getUserFromToken(): User
{
    try {
        $token = PersonalAccessToken::findToken(request()->bearerToken());
        return $token->tokenable;
    } catch (\Throwable $th) {
        return null;
    }
}
