<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Nationality()
    {
        return $this->hasOne('App\Nationality', 'country_id');
    }

    public function Mainjob()
    {
        return $this->hasOne('App\job', 'mainJob_id');
    }

    public function Bonuses()
    {
        return $this->hasOne('App\Bonuses', 'bonuses_id');
    }


    public function subjob()
    {
        return $this->hasOne('App\job', 'subJob_id');
    }

    public function Bank()
    {
        return $this->hasOne('App\Bank', 'Bank_id');
    }

    public function Address()
    {
        return $this->hasOne('App\Category', 'category_id');
    }

    public function insurance()
    {
        return $this->hasOne('App\Category', 'insurance_id');
    }

    public function Attachment()
    {
        return $this->hasOne('App\userAttachment', 'user_id');
    }

    public function groups()
    {
        return $this->hasOne('App\InboxGroupMembers', 'user_id');
    }
}
