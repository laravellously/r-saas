<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'symbol',
        'symbol_position',
        'wallet_type',
        'wallet_decimal',
        'max_withdrawable_amount',
        'min_withdrawable_amount',
        'user_id',
        'balance'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
