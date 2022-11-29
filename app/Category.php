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
        return $this->belongsTo('App\Category' ,'sub_id')->withDefault([
           'name'=> 'قسم رئيسي '
        ]);
    }

    public function CategoryUnits()
    {
        return $this->belongsTo('App\CategoryUnits', 'type');

    }
    }
