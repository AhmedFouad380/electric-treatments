<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InboxGroupMembers extends Model
{
        public function user()
        {
            return $this->belongsTo('App\User' ,'user_id');
        }

}
