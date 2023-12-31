<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $primarykey = 'scheduleID';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'organizationID',
        'scheduleName',
        'scheduleDateStart',
        'scheduleDateEnd',
        'scheduleStatus',
        'scheduleContent',
        'recyclingCategory',
        'stateName',
    ];

    public function ownedBy()
    {
        return $this->belongsTo(Organization::class, 'organizationID', 'organizationID');
    }

    // public function pointers() {
    //     return $this->hasMany(MapPointer::class, 'pointerID', 'pointerID');
    // }
}
