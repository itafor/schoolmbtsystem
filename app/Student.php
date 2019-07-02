<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'firstName', 'lastName','username','email','password','studentRegNumber'
        ,'gender','studentClass','address','phoneNo','role','birthday','photo'
    ];
}
