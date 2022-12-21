<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{

//    protected $appends = ['hijri_date'];


    public function getHijriDate($value){
        $date = \GeniusTS\HijriDate\Hijri::convertToHijri($value);
        return $date;
    }

    public function InboxAttachment(){
        return $this->HasMany(InboxAttachment::class ,'inbox_id');
    }
    public function Sender(){
        return $this->belongsTo('App\User','sender_id')->withDefault([
            'name'=>''
        ]);
    }
    public function Reciver(){
        return $this->belongsTo('App\User','reciver_id')->withDefault([
            'name'=>''
        ]);
    }

}
