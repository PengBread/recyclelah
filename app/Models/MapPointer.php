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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'scheduleID',
        'longitude',
        'latitude',
        'pointerAddress',
        'pointerStatus',
        'arrived_At',
        'confirmed_At',
        'recycleCategory',
    ];

    public function pointerSchedule() {
        return $this->belongsTo(Schedule::class, 'scheduleID', 'scheduleID');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'pointerID', 'pointerID');
    }
}
