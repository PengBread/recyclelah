<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MapPointer extends Model
{
    use HasFactory;

    protected $table = 'map_pointers';
    protected $primaryKey = 'pointerID';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        // 'scheduleID',
        'pointerCoords',
        'pointerAddress',
        'pointerStatus',
        'arrived_At',
        'confirmed_At',
        'recycleCategory',
    ];

    // public function pointerBy()
    // {
    //     return $this->hasOne(User::class, 'pointerID', 'pointerID');
    // }
}
