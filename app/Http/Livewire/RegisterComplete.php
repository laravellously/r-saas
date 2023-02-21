<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
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

        $user = auth()->user();
        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);
        $user->save();

        // $tenant = config('tenancy.tenant_model')::where('user_id', $user->id)->first();
        // $tenant->update([
        //     'username' => $data['username']
        // ]);

        if (!session()->has('tenant_id')) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'No tenant in session'
            );
        }

        Auth::loginUsingId($user->id);

        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'
        );

        return redirect()->route('tenant.dashboard', ['tenant' => session('tenant_id')]);
    }

    public function render()
    {
        return view('livewire.register-complete')->layout('layouts.guest');
    }
}
