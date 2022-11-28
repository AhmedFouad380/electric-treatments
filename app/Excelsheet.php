<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excelsheet extends Model
{
    protected $fillable = [
        'dateTime',
         'user_id'
    ];

    public function model(array $row)
    {

        return new User([
             'user_id'     => $row[0],
             'dateTime'     => $row[1],
        ]);
    }

}
