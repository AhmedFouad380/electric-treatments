<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id', 'check_date', 'check_time', 'image','type'
    ];
    protected $appends = ['hijri_date'];


    public function getHijriDateAttribute()
    {
        $date = \GeniusTS\HijriDate\Hijri::convertToHijri($this->attributes['check_date']);
        return $date;

    }

    public function getUser()
    {

        return $this->hasOne('App\User', 'fpuid', 'user_id');

    }
}
