<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    // public function subscription()
    // {
    //     return $this->hasOneThrough(Subscription::class, Plan::class);
    // }
}
