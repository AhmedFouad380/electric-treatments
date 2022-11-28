<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User' ,'category_id');
    }

    public function subCategories(){
        return $this->belongsTo('App\Category' ,'sub_id');
    }

}
