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

public function displayStudentDetail($id){
	$sessions=Session::all();
  	$subjects=Subject::all();
	$classes=Classes::all();
	$terms=Term::all();

	$student=User::where('id',$id)
				 ->where('role','student')->first();
	return view('students.student-profile',compact(['student','sessions','subjects','classes','terms']));
}
public function editStudentProfilePix(Request $request){

	  $this->validate($request,[
          'studentProfileImage' => 'required|max:5000|mimes:jpg,jpeg,png,bmp,gif'
      ]);
        $fileName = $request->studentProfileImage->getClientOriginalName();
           $request->studentProfileImage->move(public_path('upload'),$fileName);
            $users = User::WHERE('id',$request->id)
            ->update([
            'photo'=>$fileName
            ]);
        if($users){
         return back()->with('success','Profile Picture updated successfully');
        }
        return back()->withInput()->with('errors','Profile Picture update failed');
        exit;
}


public function checkStudentResult(Request $request){

	$val =	$this->validate($request,[
            'studentRegNumber' => 'required|max:255',
            'studentClass' => 'required|max:255',
            'term' => 'required|max:255',
            'sessionName' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}

$score_board_list = DB::select("SELECT *, totalmark,subject,studentRegNumber, CASE WHEN @l=total THEN @r ELSE @r:=@r+1 END as rank,
  @l:=total FROM ( select results.studentRegNumber, results.studentclass, results.term, 
           results.session, results.totalmark,results.subject,  sum(testscore + examscore) as total, sum(points) as points from results
           LEFT JOIN users ON results.studentRegNumber = users.studentRegNumber
    where 
    results.studentclass = '$request->studentClass' AND
    results.term = '$request->term' AND 
    results.session = '$request->sessionName'

        group by results.studentRegNumber  order by total desc )
            totals, (SELECT @r:=0, @l:=NULL) rank" );

$numberOfStudent=count($score_board_list);

$studentDetails = User::join('results','users.studentRegNumber','=','results.studentRegNumber')
        ->selectRaw('users.firstName, users.id, users.lastName, users.gender,users.phoneNo,users.address,users.photo,users.email,results.term,results.session, results.studentclass,results.studentRegNumber
        ')
   ->where('results.studentRegNumber',$request->studentRegNumber)
   ->where('results.studentclass',$request->studentClass)
   ->where('results.term',$request->term)
   ->where('results.session',$request->sessionName)
   ->first();

   $position =Rank::where('studentRegNumber',$request->studentRegNumber)
   ->where('studentclass',$request->studentClass)
   ->where('term',$request->term)
   ->where('sessionName',$request->sessionName)
   ->first();
// var_dump($studentDetails);
// exit();
	$fetchResults=Result::where('studentRegNumber',$request->studentRegNumber)
				->where('studentclass',$request->studentClass)
				->where('term',$request->term)
				->where('session',$request->sessionName)
				->get();
				if($fetchResults && $studentDetails){
					return view('students.result',compact(['fetchResults','studentDetails','score_board_list','position','numberOfStudent']));
				}
				return back()->withInput()->with('errors','No result found for the selected term or session');
        exit;
}

public function updateStudentProfile(Request $request){
	if(User::where('email',$request->email)->first()){
}
var_dump('email');
exit();
	}	


public function studentsResultRanking(Request $request){

	$totalmark=$request->totalMark;
	$points=$request->points;
	$rank=$request->rank;
	$regNumber=$request->studentRegNumber;
	$sessionName=$request->sessionName;
	$term=$request->term;
	$studentClass=$request->studentclass;

	$check=Rank::where('studentclass',$studentClass[0])
				->where('term',$term[0])
				->where('sessionName',$sessionName[0])
				->get();
	$ids_array=array();

		for($i=0; $i<count($check); $i++){
			if($check){
				$ids_array[]=$check[$i]['id'];
		}
				
}

foreach($ids_array as $id){
	 $ids =explode(",", $id);
        Rank::find($ids)->each(function ($rank, $key) {
            $rank->delete();
        });
}



	foreach ($totalmark as $key => $arr ){
	$finalArrays[] =array(
		 			'totalMark'         => $totalmark[$key],
		 			'points'			=> $points[$key],
 				    'rank'              =>$rank[$key],
 					'studentRegNumber'  => $regNumber[$key],
 					'sessionName'       => $sessionName[$key],
 					'term'              => $term[$key],
 					'studentclass'      => $studentClass[$key],
 				);
			}


$ranks=Rank::all();
 				if(count($ranks) >=1){
 				for ($i=0; $i<count($ranks); $i++) {
 					for($j=0; $j<count($finalArrays); $j++){
 						if(
		 $finalArrays[$j]['sessionName']      == $ranks[$i]['sessionName']
		&& $finalArrays[$j]['term']             == $ranks[$i]['term']
		&& $finalArrays[$j]['studentclass']     == $ranks[$i]['studentclass']
						){		
 						 return back()->withInput()->with('errors','Position already set');
						exit;

 									}
 								}
 							}
 				}



		if(!empty($finalArrays)){
 				$storeRank=DB::table('ranks')->insert($finalArrays);
 				if($storeRank){
		  return back()->with('success','Position updated successfully');
				}
				  return back()->withInput()->with('errors','rank storage failed');
			exit;
 	
}
	
}


}