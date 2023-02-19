<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway',
        'wallet_id',
        'status',
        'amount'
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
