<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'transaction_date',
        'amount',
        'description',
        'category',
        'transaction_type',
        'currency',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    // Hubungan dengan BankAccount
    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'account_id');
    }
}
