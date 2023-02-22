<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Stancl\Tenancy\Contracts\Syncable;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

class User extends \TCG\Voyager\Models\User implements Syncable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ResourceSyncing;

    public $timestamps = false;

    protected $guard = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_seen_at',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return CentralUser::class;
    }

    public function getSyncedAttributeNames(): array
    {
        return [
            'name',
            'password',
            'email',
            'username',
            'profile_photo_url',
        ];
    }

    public function subscribed($plan)
    {

        $plan = Plan::where('slug', $plan)->first();
        // if the user is an admin they automatically have access to the default plan
        if (isset($plan->default) && $plan->default && $this->hasRole('admin')) return true;
        if (isset($plan->slug) && $this->hasRole($plan->slug)) {
            return true;
        }

        return false;
    }

    public function subscriber()
    {

        if ($this->hasRole('admin')) return true;
        $roles = $this->roles->pluck('id')->push($this->role_id)->unique();
        $plans = Plan::whereIn('role_id', $roles)->count();
        // If the user has a role that belongs to a plan
        if ($plans) {
            return true;
        }

        return false;
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

}
