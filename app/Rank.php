<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'totalMark','points','rank','studentRegNumber','sessionName','term','studentclass',
    ];
}
