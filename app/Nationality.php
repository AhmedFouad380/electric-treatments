<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User' ,'country_id');
    }

}
