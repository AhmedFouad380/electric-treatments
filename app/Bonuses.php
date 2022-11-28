<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonuses extends Model
{
    //
    protected $fillable = [
        'name','overtime','late','early','notsign','absence'
    ];

}
