<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'secpassword',
        'password',
        'rowpass',
        'trytocard',
        'changepwdret',
        'active',
        'LockPassword',
        'trytohack',
        'newlocked',
        'locked',
        'LastLoginIP',
        'PasspodMode',
        'email',
        'cmnd',
        'dob',
        'coin',
        'dateCreate',
        'lockedTime',
        'testcoin',
        'lockedCoin',
        'bklactivenew',
        'bklactive',
        'nExtpoin1',
        'nExtpoin2',
        'nExtpoin4',
        'nExtpoin5',
        'nExtpoin6',
        'nExtpoin7',
        'scredit',
        'nTimeActiveBKL',
        'nLockTimeCard',
        'history_add_coin',
        'ref',
        'refer',
    ];

    /**
     * Get the user that owns this account.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'ref');
    }
}
