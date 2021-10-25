<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Organization extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;

    protected $table = 'organizations';
    protected $primaryKey = 'organizationID';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'organizationID',
        'organizationName',
        'organizationCode',
    ];

    public function ownedBy()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function staffs()
    {
        return $this->hasMany(User::class, 'organizationID', 'organizationID');
    }
}
