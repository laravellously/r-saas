<?php

namespace App\Support;

use Illuminate\Session\DatabaseSessionHandler;
use Stancl\Tenancy\Contracts\Tenant;

class CustomSessionHandler extends DatabaseSessionHandler
{
    // /**
    //  * {@inheritdoc}
    //  *
    //  * @return string|false
    //  */
    // #[\ReturnTypeWillChange]
    // public function read($sessionId)
    // {
    //     //OVERWRITTEN: scope to tenant_id if possible
    //     //$session = (object) $this->getQuery()->find($sessionId);
    //     $tenantId = Tenant::current()?->id;
    //     $session = (object) $this->getQuery()->where('tenant_id', $tenantId)->find($sessionId);

    //     if ($this->expired($session)) {
    //         $this->exists = true;

    //         return '';
    //     }

    //     if (isset($session->payload)) {
    //         $this->exists = true;

    //         return base64_decode($session->payload);
    //     }

    //     return '';
    // }

    // /**
    //  * {@inheritdoc}
    //  *
    //  * @param  string  $data
    //  * @return array
    //  */
    // protected function getDefaultPayload($data)
    // {
    //     $payload = [
    //         'payload' => base64_encode($data),
    //         'last_activity' => $this->currentTime(),
    //         'tenant_id' => Tenant::current()?->id, //OVERWRITTEN: Added tenant_id
    //     ];

    //     if (! $this->container) {
    //         return $payload;
    //     }

    //     return tap($payload, function (&$payload) {
    //         $this->addUserInformation($payload)
    //              ->addRequestInformation($payload);
    //     });
    // }

    protected function getQuery()
    {
        if (! Tenant::checkCurrent()) {
            return parent::getQuery()->whereNull('tenant_id');
        }

        return parent::getQuery()->where('tenant_id', Tenant::current()->id);
    }

    protected function addRequestInformation(&$payload)
    {
        parent::addRequestInformation($payload);

        $payload['tenant_id'] = Tenant::current()?->id;

        return $this;
    }

}
