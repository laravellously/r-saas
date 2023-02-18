<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class RegisterComplete extends Component
{
    use Actions;

    public $name;

    public $password;

    protected $rules = [
        'name' => 'required|min:6',
        'password' => 'required|min:8|alpha_num:ascii',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function submit()
    {
        $data = $this->validate();

        $user = auth()->user();
        $user->name = $data['name'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'
        );

        $domain = null;

        try {
            $tenant = tenancy()->find(auth()->id());
            $domain = $tenant->domains()->create([
                'domain' => 'acme',
            ]);
            $this->notification()->success(
                $title = 'Domain created',
                $description = 'Your domain was successfully created'
            );
        } catch (\Throwable $th) {
            $this->notification()->error(
                $title = 'An error occured',
                $description = $th->getMessage()
            );
        }

        return redirect()->route('tenant.dashboard', ['tenant' => $tenant->id]);
    }

    public function render()
    {
        return view('livewire.register-complete')->layout('layouts.guest');
    }
}
