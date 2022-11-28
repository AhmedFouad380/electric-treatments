<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function User(){
        return $this->belongsTo(User::class ,'user_id')->withDefault([
            'name'=>'تم حذف الموظف'
        ]);
    }
}
