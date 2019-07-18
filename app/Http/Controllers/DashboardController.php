<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Classes;
use App\Admin;
use Auth;
use App\User;
use Hash;
use Excel;
use DB;
use App\Term;
use App\Result;
use App\Subject;
use App\Session;
use App\Rank;
use App\Feehistory;
use App\Generalsetting;
class DashboardController extends Controller
{
     public function allStudent(){
    $getAllStudent=User::where('role','student')->get();
    $studentCount=count($getAllStudent);

         $getAllTeachingStaff=User::where('role','teacher')->get();
    $teachingStaffCount=count($getAllTeachingStaff);

    $generalpaymentHistory=Feehistory::all();
    $paymentHistoryCount=count($generalpaymentHistory);

     $studentsResult=Result::all();
    $resultCount=count($studentsResult);

    $classes=Classes::all();
    $allClasses='All Classes';
   $fetchSettings=Generalsetting::find(1);
    return view('dashboard.v1',compact(['studentCount','paymentHistoryCount','teachingStaffCount','resultCount','fetchSettings']));
    }

 

    public function versiontwo()
    {
        return view('dashboard.v2');
    }
    public function versionthree()
    {
        return view('dashboard.v3');
    }

   

}
