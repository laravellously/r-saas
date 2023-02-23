<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'amount',
        'note',
        'destination',
        'type',
        'status',
        'receipt',
        'fee'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function origin()
    {
        return $this->belongsTo(Wallet::class, 'origin');
    }

    public function destination()
    {
        return $this->belongsTo(Wallet::class, 'destination');
    }
}
