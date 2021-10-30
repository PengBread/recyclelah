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
        'scheduleID',
        'organizationID',
        'scheduleName',
        'scheduleDate',
        'scheduleTimeStart',
        'scheduleTimeEnd',
        'scheduleStatus',
        'scheduleContent',
        'recyclingCatagory',
        'stateName',
    ];

    public function ownedBy()
    {
        return $this->belongsTo(Organization::class, 'organizationID', 'organizationID');
    }
}
