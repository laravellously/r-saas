<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class RegisterComplete extends Component
{
    use Actions;

    public $name;

    public $password;

    public $username;

    protected $rules = [
        'name' => 'required|min:6',
        'password' => 'required|min:8|alpha_num:ascii',
        'username' => 'required|min:6|unique:users'
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function submit()
    {
        $data = $this->validate();

        $user = Auth::user();
        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);
        $user->saveQuietly();

        if (!session()->has('tenant_id')) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'No tenant in session'
            );

            return false;
        }

        $tenant_id = session('tenant_id');

        tenancy()->initialize($tenant_id);
        // auth('web')->attempt(['email' => $user->email, 'password' => $user->password], true);

        $u = new User();

        $u->name = $data['name'];
        $u->email = $user->email;
        $u->password = bcrypt($data['password']);
        $u->global_id = $user->global_id;
        $u->username = $data['username'];
        $u->saveQuietly();

        // tenant()->run(function () use ($user) {
        //     auth('web')->attempt(['email' => $user->email, 'password' => $user->password], true);
        // });

        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'
        );

        return redirect()->route('tenant.dashboard', ['tenant' => $tenant_id]);
    }

    public function render()
    {
        return view('livewire.register-complete')->layout('layouts.guest');
    }
}
