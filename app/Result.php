<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'fullName','studentRegNumber','testscore','examscore','points','remark'
        ,'subject','session','term','studentclass','user_id'
    ];
}
