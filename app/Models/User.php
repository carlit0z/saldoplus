<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'access_token',
        'refresh_token',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Hubungan dengan BankAccount
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    // Hubungan dengan Budgets
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    // Hubungan dengan Notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
