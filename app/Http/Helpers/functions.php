<?php

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
