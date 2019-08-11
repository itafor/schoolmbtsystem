<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected  $fillable=['email','user_id','order_id','amount','quantity','paystack_reference'];
}
