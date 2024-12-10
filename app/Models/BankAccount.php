<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_name',
        'account_number',
        'balance',
        'currency',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Hubungan dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hubungan dengan Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
