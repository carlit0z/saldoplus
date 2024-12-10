<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'read_status',
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
}
