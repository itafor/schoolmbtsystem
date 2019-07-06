<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;

class ResultController extends Controller
{
	public $studentClass = 'ss1';
	var $data = array();
public function __construct(){
	
	$this->data['users'] = Auth::User();
		//if($this->data['users']->role != "admin") exit;
	}


  public function listStudents(){
  	$sessions=Session::all();
  	$subjects=Subject::all();
	$students=User::where('role','student')->get();
	$classes=Classes::all();
	$terms=Term::all();
	$byClasses=User::where('role','student')
	->paginate(1);
	$usedClass = '';
	$subj='';
	$section='';
	return view('students.enter-result',compact(['students','classes','terms','byClasses','usedClass','sessions','subjects','section','subj']));
}

public function ressultFormData(Request $request){
	if(
		$request->sessionName===null || $request->subjectName===null || $request->term===null
		 || $request->studentClass===null
	){
		 return back()->withInput()->with('errors','Ooops!! all fields requred');
		exit;
	}

	

	
 		if(!isset($request->studentClass) || !isset($request->term )){
 			 return back()->withInput()->with('errors','please enter student class');
			exit;
 		}else{
 	 $sessions=Session::all();
 	 $session=Session::where('sessionName',$request->sessionName)->first();
 	$section =$session->sessionName;
  	$subjects=Subject::all();
  	$sub=Subject::where('subjectName',$request->subjectName)->first();
  	$subj=$sub->subjectName;
	$students=User::where('role','student')->get();
	$classes=Classes::all();
	$classToUser=Classes::where('className',$request->studentClass)->first();
	$usedClass =$classToUser->className;
	$terms=Term::all();
	$termi=Term::where('termName',$request->term)->first();
    $terminal =$termi->termName;
    
	$byClasses=User::where('studentclass',$request->studentClass)->get();
	return view('students.enter-result',compact(['students','usedClass','classes','terminal','terms','byClasses','sessions','subjects','subj','section']));
}

}
public function findClass($stdClass){
	$byClasses=User::where('studentclass',$stdClass)->get();
	$this->studentClass = $stdClass;

	// return response()->json($this->studentClass);
		}
public function getRegNumber(Request $request){
	$regNumber=User::where('id',$request->id)->first();
	return response()->json($regNumber);
}
public function getStudents($stdClass){
	$classes=User::where('studentclass',$stdClass)->get();
	return $classes;
}

public function storeResult(Request $request){

$data=$request->studentRegNumber;
$exScore=$request->examscore;
$userId =$request->studentId;
if(is_array($exScore)){
	for($i=0; $i<count($exScore); $i++){
		if($exScore[$i] === null){
			 return back()->withInput()->with('errors','Exam Score field cannot be empty, its requred!!');
		exit;
		}
	}
}

 if(is_array($userId)){
	for($i=0; $i<count($userId); $i++){
		if($userId[$i] === null){
			 return back()->withInput()->with('errors','Student Name field cannot be empty, its requred!!');
		exit;
		}
	}
}

	$uniqueArrayVal = $this->arrayUniqe($data);
	 if($uniqueArrayVal){
	 	 return back()->withInput()->with('errors','Duplicate registration number detected!!');
		exit;
	 }

	foreach ($request->studentClass as $key => $arr ){
	$finalArrays[] =array(
		 			'studentClass'         => $request->studentClass[$key],
 				    'user_id'              =>$request->studentId[$key],
 					'studentRegNumber'     => $request->studentRegNumber[$key],
 					'testscore'            => $request->testscore[$key],
 					'examscore'            => $request->examscore[$key],
 					'points'               => $request->points[$key],
 					'remark'               => $request->remark[$key],
 					'subject'              => $request->subject[$key],
 					'session'              =>$request->session[$key],
 					'term'                 => $request->term[$key],
 				);
			}

				
	$results=Result::all();
 				if(count($results) >=1){
 				for ($i=0; $i<count($results); $i++) {
 					for($j=0; $j<count($finalArrays); $j++){
 						if(
	       $finalArrays[$j]['subject']          == $results[$i]['subject'] 
		&& $finalArrays[$j]['session']          == $results[$i]['session']
		&& $finalArrays[$j]['term']             == $results[$i]['term']
		&& $finalArrays[$j]['studentClass']     == $results[$i]['studentclass']
						){		
 						 return back()->withInput()->with('errors','The results you are about to upload already exist');
						exit;
 						}
 					}
 				}
 				}


				if(!empty($finalArrays)){
 				$results=DB::table('results')->insert($finalArrays);
 				if($results){
		  return back()->with('success','Results uploaded successfully');
				}
				  return back()->withInput()->with('errors','results upload failed');
			exit;
 	
}

}

public  function arrayUniqe($arr)
{
 $arrUniq = array_diff_key($arr, array_unique($arr));
 return  $arrUniq;
}

public function displaySubform(){
		return view('/students.add-subject');
	}

	public function addSubject(Request $request){

	foreach ($request->subjectName as $key => $arr ){
	$finalArrays[] =array(
		 			'subjectName'         => $request->subjectName[$key],
 				);
			}

	$results=Subject::all();
 				if(count($results) >=1){
 				for ($i=0; $i<count($results); $i++) {
 					for($j=0; $j<count($finalArrays); $j++){
 						if(
   		   $finalArrays[$j]['subjectName'] == $results[$i]['subjectName']
						){		
 						 return back()->withInput()->with('errors','The Subjects you are about to upload already exist');
						exit;
 						}
 					}
 				}
 				}

				if(!empty($finalArrays)){
 				$results=DB::table('subjects')->insert($finalArrays);
 				if($results){
		  return back()->with('success','Subjects uploaded successfully');
				}
				  return back()->withInput()->with('errors','Subjects upload failed');
			exit;
 	
}
	}


	public function importResultAsExcelFile(Request $request){
			$val =	$this->validate($request,[
            'result_file' => 'required|mimes:xls,xlsx'
            ]);

 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
 		
 		$path=$request->file('result_file')->getRealPath();
 		$data=Excel::load($path)->get();

 		$getUniqueRegNo=array();

 		for($i=0; $i<count($data); $i++){
 			$getUniqueRegNo[]=$data[$i]['registration_number'];
 		}
 		
  		foreach($getUniqueRegNo as $reg){
 			$checkIfRegNoExist=User::where('studentRegNumber',$reg)->first();
 			if(!$checkIfRegNoExist){
 		 return back()->withInput()->with('errors','This registration number, '.$reg.' does not exist in our record!!');
		exit;
 			}
 		}
 		

		$uniqueArrayVal = $this->arrayUniqe($getUniqueRegNo);
	 if($uniqueArrayVal){
	 	 return back()->withInput()->with('errors','Duplicate registration number detected!!');
		exit;
	 }

 		if($data->count() > 0) {
 		$result_arrays=array();
 		$result_arrays=$data;
 		
 		foreach($result_arrays as  $key => $arr){
 			$student_result_array[]=array(
 				    'studentRegNumber'    => $arr['registration_number'],
 					'studentClass'     => $arr['student_class'],
 					'testscore'     => $arr['test_score'],
 					'examscore'        => $arr['exam_score'],
 					'points'     => $arr['points'],
 					'remark' => $arr['remark'],
 					'subject'        => $arr['subject'],
 					'session'       => $arr['session'],
 					'term'          => $arr['term'],
 				);
 		}
 		  


 			$results=Result::all();
 				if(count($results) >=1){
 				for ($i=0; $i<count($results); $i++) {
 					for($j=0; $j<count($student_result_array); $j++){
 						if(
	       $student_result_array[$j]['subject']          == $results[$i]['subject'] 
		&& $student_result_array[$j]['session']          == $results[$i]['session']
		&& $student_result_array[$j]['term']             == $results[$i]['term']
		&& $student_result_array[$j]['studentClass']     == $results[$i]['studentclass']
						){		
 						 return back()->withInput()->with('errors','The results you are about to upload already exist');
						exit;
 						}
 					}
 				}
 				}
 			
 				if(!empty($student_result_array)){
 				$User=DB::table('results')->insert($student_result_array);
 				if($User){
		  return back()->with('success','Result uploaded successfully ');
				}
				  return back()->withInput()->with('errors','Result upload failed');
			exit;
 			}
 			}

		}
  
}