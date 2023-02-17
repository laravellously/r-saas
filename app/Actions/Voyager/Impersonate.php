<?php

namespace App\Actions\Voyager;

use TCG\Voyager\Actions\AbstractAction;
use App\Models\Tenant;

class Impersonate extends AbstractAction
{
    public $redirectUrl = '/dashboard';

    public function getTitle()
    {
        return 'Impersonate';
    }

    public function getIcon()
    {
        return 'voyager-people';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        $tenant = Tenant::find($this->data->id);
        if ($tenant) {
            # code...
            $token = tenancy()->impersonate($tenant, $this->data->id, $this->redirectUrl);
            return route('impersonate', ['token' => $token->token, 'tenant' => $tenant->id]);
        } else {
            return route('landing');
        }
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }

    public function shouldActionDisplayOnRow($row)
    {
        $tenant = Tenant::find($row->id);
        return $tenant ? true : false;
    }
}
