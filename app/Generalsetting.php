<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    protected $fillable=['schoolName','pob','email','telephone','cellPhone','schoolLogo','schoolAddress'];
}
