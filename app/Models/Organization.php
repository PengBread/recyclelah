<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
        'organizationName'
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
