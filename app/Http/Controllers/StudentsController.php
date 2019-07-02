<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Classes;
use App\Admin;
use Session;
use Auth;
use App\User;
use Hash;
class StudentsController extends Controller
{

    public function getStudentForm(){
    	$classes=Classes::all();
        return view('admin.add-student',compact(['classes']));
    }

    	public function createStudent(Request $request){
		if(auth::user()->role != "admin") {
			 return back()->withInput()->with('errors','Forbiden only admin can');
			exit;
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

}
