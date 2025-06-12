<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'to_account',
        'coin',
        'status',
        'description',
        'completed_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the transfer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_account');
    }
} 