<?php

namespace App\Actions\Fortify;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use TCG\Voyager\Models\Role;
use Laravel\Fortify\Rules\Password;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $role = Role::where('name', '=', config('voyager.user.default_role'))->first();

        Validator::make($input, [
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['string'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $role->id
        ]);

        $user->createToken('Rimplenet API');

        Tenant::create([
            'user_id' => $user->id
        ]);

        // return DB::transaction(function () use ($input) {
        //     return tap(User::create([
        //         'name' => $input['name'],
        //         'email' => $input['email'],
        //         'password' => Hash::make($input['password']),
        //     ]), function (User $user) {
        //         $this->createTeam($user);
        //     });
        // });

        return $user;
    }
}
