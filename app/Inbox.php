<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{

    protected $appends = ['hijri_date'];


    public function getHijriDate($value){
        $date = \GeniusTS\HijriDate\Hijri::convertToHijri($value);
        return $date;
    }
}
