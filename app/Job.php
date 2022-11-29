<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'subJob_id');
    }
    public function Category()
    {
        return $this->belongsTo('App\Category', 'category_id')->withDefault([
            'name'=>''
        ]);
    }

    public function JobType()
    {
        return $this->belongsTo('App\JobType', 'job_type')->withDefault([
            'name'=>''
        ]);
    }

}
