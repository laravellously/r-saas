<?php

namespace App\Exceptions;

use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;
use Stancl\Tenancy\Contracts\TenantCouldNotBeIdentifiedException;

class IdentifyTenantException extends TenantCouldNotBeIdentifiedException implements ProvidesSolution
{
    public function __construct($tenant_token)
    {
        parent::__construct("Tenant could not be identified: $tenant_token");
    }

    public function getSolution(): Solution
    {
        return BaseSolution::create('Tenant could not be identified with this request data')
            ->setSolutionDescription('Did you forget to create a tenant with this id?')
            ->setDocumentationLinks([
                'Creating Tenants' => 'https://tenancyforlaravel.com/docs/v3/tenants/',
            ]);
    }
}