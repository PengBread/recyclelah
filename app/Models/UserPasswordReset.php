<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPasswordReset extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'userID';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'userID',
        'token',
        'used_At',
        'created_At',
        'updated_At',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function requestBy() {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
