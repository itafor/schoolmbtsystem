<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feesetting extends Model
{
     protected $fillable = [
         'className','sessionName','term','feeAmount'
    ];
}
