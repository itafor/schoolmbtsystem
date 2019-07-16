<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feehistory extends Model
{
     protected $fillable = [
         'className','sessionName','term','feeAmount','amountPaid','item','balance','status','datePaid','receivedFrom','receivedBy','receiptNo','user_id'
    ];
}
