<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use TCG\Voyager\Models\Role;

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
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // create user wallet based on plan

        return DB::transaction(function () use ($input, $role) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
                'role_id' => $role->id
            ]), function (User $user) {
                // foreach role->wallet_type
                $this->createWallet($user);
            });
        });
    }

    protected function createWallet(User $user): void
    {
        $user->wallets()->saveQuietly(Wallet::forceCreate([
            'name' => 'US Dollar',
            'address' => random_string(),
            'symbol' => 'USD',
            'symbol_position' => 'BEFORE',
            'wallet_type' => 'FIAT',
            'wallet_decimal' => 2,
            'max_withdrawable_amount' => 100,
            'user_id' => $user->id,
        ]));
    }
}
