<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Artisan;
use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class SessionBooter implements TenancyBootstrapper
{
    /** @var Repository */
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function bootstrap(Tenant $tenant)
    {
        /** @var TenantWithDatabase $tenant */

        //purge config
        $this->purgeSessionConfig();

        // Set config.session.connection to tenant
        $this->config['session.driver'] = 'database';
        $this->config['session.connection'] = 'tenant';
        $this->config['session.path'] = $tenant->database()->getName();

    }

    public function revert()
    {
        $this->purgeSessionConfig();
    }

    protected function purgeSessionConfig()
    {
        tenant()->run(function () {
            Artisan::call('config:clear');

            $this->config->offsetUnset('session.driver');
            $this->config->offsetUnset('session.connection');
            $this->config->offsetUnset('session.path');

            // Artisan::call('config:cache');
        });
    }
}
