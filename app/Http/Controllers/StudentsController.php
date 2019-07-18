<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;
use App\Classes;
use App\Admin;
use App\Session;
use Auth;
use App\User;
use Hash;
use Excel;
use DB;
use App\Term;
use App\Subject;
use App\Generalsetting;

class StudentsController extends Controller
{

public function listStudent(){
		if(auth::user()->role != "admin" || auth::user()->role != "teacher") {
			abort(404,'Not allowed');
			}
	$classes=Classes::all();
	$students_count=User::where('role','student')->get();
	$total=count($students_count);
	$students=User::where('role','student')->paginate(10);
  	$fetchSettings=Generalsetting::find(1);
	
	return view('students.list-students',compact(['students','total','classes','fetchSettings']));
}

public function searchAction(Request $request){
	$query=$request->searchItem;
	$students_count=User::where('role','student')->get();
	$classes=Classes::all();
	$total=count($students_count);
	 $students = DB::table('users')
         ->where('role','student')
         ->orWhere('studentRegNumber', 'like', '%'.$query.'%')
         ->orWhere('studentClass', 'like', '%'.$query.'%')
         ->paginate(10);
  	$fetchSettings=Generalsetting::find(1);

	return view('students.list-students',compact(['students','total','classes','fetchSettings']));

}

    public function getStudentForm(){

    	if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}
    	$classes=Classes::all();
  	$fetchSettings=Generalsetting::find(1);
        return view('students.add-student',compact(['classes','fetchSettings']));
    }

    	public function createStudent(Request $request){
		if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}

		if(User::where('username',trim(Input::get('username')))->count() >=1){
       return back()->withInput()->with('errors','The username you entered already exist');
			exit;
		}
		if(User::where('email',Input::get('email'))->count() >= 1){
			 return back()->withInput()->with('errors','The Email you entered already exist');
			exit;
		}

       if(User::where('studentRegNumber',trim(Input::get('studentRegNumber')))->count() >=1){
       return back()->withInput()->with('errors','The Registration Number you entered already exist');
			exit;
		}

 	$val =	$this->validate($request,[
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'username' => 'required|max:255',
             'email' => 'required|email|max:255|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/|unique:users',
            'gender' => 'required|max:255',
            'password' => 'required|max:255',
            'address' => 'required|max:255',
            'birthday' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
		$User = new User();
		$User->firstName = Input::get('firstName');
		$User->lastName = Input::get('lastName');
		$User->username = Input::get('username');
		$User->email = Input::get('email');
		$User->password = Hash::make(Input::get('password'));
		$User->studentRegNumber= Input::get('studentRegNumber');
		$User->gender = Input::get('gender');
		$User->studentClass = Input::get('studentClass');
		$User->address = Input::get('address');
		$User->phoneNo = Input::get('phoneNo');
		$User->role = "student";
		$User->birthday = Input::get('birthday');
		$User->save();
		
		if (Input::hasFile('photo')) {
			     $fileName = $request->photo->getClientOriginalName();
           $request->photo->move(public_path('upload'),$fileName);
			$User->photo =  $fileName;
			$User->save();
		}
		if($User){
		  return back()->with('success','You have successfully add a new class');
		}
		
	}

public function importExcelFile(Request $request){
	$val =	$this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
            ]);

 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
 		$path=$request->file('select_file')->getRealPath();
 		$data=Excel::load($path)->get();
 		
 		if($data->count() > 0) {
 		$arrays=array();
 		$arrays=$data;
			
 		
 		foreach($arrays as  $key => $arr){
 			$enter[]=array(
 				    'firstName'    => $arr['first_name'],
 					'lastName'     => $arr['last_name'],
 					'username'     => $arr['username'],
 					'email'        => $arr['email'],
 					'password'     =>Hash::make($arr['password']),
 					'studentRegNumber' => $arr['reg_no'],
 					'gender'        => $arr['gender'],
 					'address'       => $arr['address'],
 					'role'          => $arr['role'],
 					'birthday'      => $arr['birthday'],
 					'studentClass'  => $arr['student_class'],
 					'phoneNo'  => $arr['phone_number']
 				);
 		}
 		  

 				$alluser=User::all();
 				if(count($alluser) >=1){
 				for ($i=0; $i<count($alluser); $i++) {
 					for($j=0; $j<count($enter); $j++){
 						if($enter[$j]['email'] == $alluser[$i]['email'] || $enter[$j]['username'] == $alluser[$i]['username']){
 						 return back()->withInput()->with('errors','The Email or username or reg. number  you entered already exist');
						exit;
 						}
 					}
 				}
 				}
 			
 				if(!empty($enter)){
 				$User=DB::table('users')->insert($enter);
 				if($User){
		  return back()->with('success','You have successfully uploaded your file');
				}
				  return back()->withInput()->with('errors','Excel upload failed');
			exit;
 			}
 			}

		}


public function exportToExcel(Request $request){
	$byClass=$request->student_class;
	
	if($byClass === null){
		 return back()->withInput()->with('errors','Please select a class');
			exit;
	}
		$students_data=DB::table('users')
				->where('role','student')
				->where('studentClass',$byClass)
				->orderBy('gender')
				->get();

				if( count($students_data)<=0){
		 return back()->withInput()->with('errors','No record associated with the selected class');
			exit;
	}
		$students_array[]=array('FIRST NAME','LAST NAME','EMAIL','REGISTRATION NO.','GENDER','CLASS','ADDRESS','PHONE NO.','BIRTHDAY');

		foreach ($students_data as $student) {
			$students_array[]=array(
				'FIRST NAME'   => $student->firstName,
				'LAST NAME'    => $student->lastName,
				'Email'   	   => $student->email,
				'REG. NO.'     => $student->studentRegNumber,
				'GENDER '      => $student->gender,
				'CLASS'   	   => $student->studentClass,
				'ADDRESS'   => $student->address,
				'PHONE NO.'   => $student->phoneNo,
				'BIRTHDAY'   => $student->birthday,

			);
		}

		Excel::create('Student Data',function($excel) use ($students_array) {
			$excel->setTitle('Student Data');
			$excel->sheet('Student Data', function($sheet) use($students_array){
				$sheet->fromArray($students_array, null, 'A1', false, false);
			});
		})->download('xlsx');

	}



public function exportAll(Request $request){

		$students_data=DB::table('users')
				->where('role','student')
				->orderBy('studentClass','desc')
				->get();

				if( count($students_data)<=0){
		 return back()->withInput()->with('errors','No record associated with the selected class');
			exit;
	}
		$students_array[]=array('FIRST NAME','LAST NAME','EMAIL','REGISTRATION NO.','GENDER','CLASS','ADDRESS','PHONE NO.','BIRTHDAY');

		foreach ($students_data as $student) {
			$students_array[]=array(
				'FIRST NAME'   => $student->firstName,
				'LAST NAME'    => $student->lastName,
				'Email'   	   => $student->email,
				'REG. NO.'     => $student->studentRegNumber,
				'GENDER '      => $student->gender,
				'CLASS'   	   => $student->studentClass,
				'ADDRESS'   => $student->address,
				'PHONE NO.'   => $student->phoneNo,
				'BIRTHDAY'   => $student->birthday,

			);
		}

		Excel::create('Student Data',function($excel) use ($students_array) {
			$excel->setTitle('Student Data');
			$excel->sheet('Student Data', function($sheet) use($students_array){
				$sheet->fromArray($students_array, null, 'A1', false, false);
			});
		})->download('xlsx');
	}


		public function exportAsPdf(){
			$students=DB::table('users')
				->where('role','student')
				->get();
		return view('students.list-students',compact(['students']));
			$pdf = PDF::loadView('students.list-students');
return $pdf->download('invoice.pdf');
		}

		public function getTermForm(){
			if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}
  	$fetchSettings=Generalsetting::find(1);

			return view('students.term',compact('fetchSettings'));
		}

		public function createTerm(Request $request){

		$val =	$this->validate($request,[
            'termName' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
 		
		$term=Term::where('termName', $request->termName)->first();
		if($term){
       return back()->withInput()->with('errors','The term you are about to add already exist');
		}

		
		$term = new Term();
		$term->termName = Input::get('termName');
		$term->save();
		  if($term){
         return back()->with('success','You have successfully added a new term');
 
        }
        return back()->withInput()->with('errors','An attempt to add a new term failed');
	}

	   function globalSearch(Request $request){
     if($request->get('query2'))
     {
      $query2 = $request->get('query2');
      $users = User::where('studentRegNumber','like',"%{$query2}%")
      ->orwhere('firstName','like',"%{$query2}%")
      ->orwhere('lastName','like',"%{$query2}%")
      ->orwhere('studentClass','like',"%{$query2}%")
    ->get();
    $output = '<ul class="dropdown-menu" 
    style="display: block; 
    position: absolute; z-index: 1; width:300px; padding-left:20px; margin-left:10px;">';
    foreach ($users as $row) {
$output.='<li><a href="/student-profile/'.$row->id.'">'.$row->firstName.' '.$row->lastName.'</a></li>';
    }
   $output .='</ul>';
   echo $output;
    ;
    }
   }

   public function findStudent(Request $request){
   		$sessions=Session::all();
  	$subjects=Subject::all();
	$classes=Classes::all();
	$terms=Term::all();

	$student=User::where('studentRegNumber',$request->regNo)
				 ->where('role','student')->first();
  	$fetchSettings=Generalsetting::find(1);

	return view('students.student-profile',compact(['student','sessions','subjects','classes','terms','fetchSettings']));
   }
   public function displayTerm(){
   	$getTerm=DB::table('terms')
     ->whereNull('deleted_at')->paginate(10);
   	 $trashedTerms=DB::table('terms')
   	 ->whereNotNull('deleted_at')->get();
  	$fetchSettings=Generalsetting::find(1);
   	 
   	return view('students.list-term',['terms'=>$getTerm,'trashedTerms'=>$trashedTerms,'fetchSettings'=>$fetchSettings]);
   }
   public function deleteTerm($id){
   	if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}
   	$findTerm=Term::where('id',$id)->first();
   	if($findTerm->delete()){
		  return back()->with('success','Term Deleted successfully');
   	}
   	return back()->withInput()->with('errors','An attempt to delete the selected term failed');
			exit;
   }
   public function restoreDeletedTerms($id){
   	if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}
   	$restore=Term::withTrashed()->find($id)->restore();
   	if($restore){
		  return back()->with('success','restored successfully');
   	}
   	return back()->withInput()->with('errors','Restore failed');
			exit;
   }
}
