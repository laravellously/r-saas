<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterComplete extends Component
{
    public $name;

    public $password;

    protected $rules = [
        'name' => 'required|min:6',
        'password' => 'required|min:8|alpha_num:ascii',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $data = $this->validate();

        $user = auth()->user();
        $user->name = $data['name'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $domain = null;

        try {
            $tenant = tenancy()->find(auth()->id());
            $domain = $tenant->domains()->create([
                'domain' => 'acme',
            ]);
        } catch (\Throwable $th) {
        }

        return redirect()->route('dashboard')->domain($domain);
    }

    public function render()
    {
        return view('livewire.register-complete')->layout('layouts.guest');
    }
}
