<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AskPermission extends Model
{
    protected $fillable = [
        'permission_date',
        'from',
        'to',
        'reason',
        'description',
        'request_date',
        'status',
        'user_id',
        'manager_id',
        'job_id'
    ];

    protected $appends = ['hijri_date'];

    public function getHijriDateAttribute()
    {
        $date = \GeniusTS\HijriDate\Hijri::convertToHijri($this->attributes['permission_date']);
        return $date;

    }

    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'user_id');

    }

    public function getManager()
    {

        return $this->hasOne('App\User', 'id', 'manager_id');

    }

    public function getJob()
    {

        return $this->hasOne('App\Job', 'id', 'job_id');

    }
}
