<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','username','email','password','studentRegNumber'
        ,'gender','studentClass','address','phoneNo','role','birthday','photo'
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
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function results(){
        return $this->hasMany('App\Result');
    }

     public function searchableAs()
    {
        return 'firstName';
    }

    public function isVerified(){
        return (bool) $this->email_verified_at;
    }

     public function notVerified(){
        return (bool) !$this->email_verified_at;
    }
}
