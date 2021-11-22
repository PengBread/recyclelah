<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'userID';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'password',
        'organizationID',
        'status',
        'points',
        'pointerID',
        'isVerified',
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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function affiliate() {
        return $this->belongsTo(Organization::class, 'organizationID', 'organizationID');
    }

    public function pointer(){
        return $this->belongsTo(MapPointer::class, 'pointerID', 'pointerID');
    }

    public function passwordReset() {
        return $this->hasOne(UserPasswordReset::class, 'userID', 'userID');
    }

    // public function ranking() {
    //     $collection = collect(User::orderBy('points', 'ASC')->get());
    //     $data = $collection->where('id', $this->id);
    //     $value = $data->keys()->first() +1;

    //     return $value;
    // }
}