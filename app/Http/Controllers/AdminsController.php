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
class AdminsController extends Controller
{

	public function displaySession(){
		return view('/students.add-session');
	}

	public function addSession(Request $request){

	foreach ($request->sessionName as $key => $arr ){
	$finalArrays[] =array(
		 			'sessionName'         => $request->sessionName[$key],
 				);
			}

	$results=Session::all();
 				if(count($results) >=1){
 				for ($i=0; $i<count($results); $i++) {
 					for($j=0; $j<count($finalArrays); $j++){
 						if(
   		   $finalArrays[$j]['sessionName'] == $results[$i]['sessionName']
						){		
 						 return back()->withInput()->with('errors','The session you are about to add already exist');
						exit;
 						}
 					}
 				}
 				}

				if(!empty($finalArrays)){
 				$results=DB::table('sessions')->insert($finalArrays);
 				if($results){
		  return back()->with('success','Session added successfully');
				}
				  return back()->withInput()->with('errors','Session addition failed');
			exit;
 	
}
	}


  }
