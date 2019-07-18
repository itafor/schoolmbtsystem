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
use App\Generalsetting;

class TeachersController extends Controller
{
    
    public function getTeacherForm(){
    	if(auth::user()->role != "admin") {
			abort(404,'Not allowed');
			}
  	$fetchSettings=Generalsetting::find(1);

        return view('teachers.add-teacher',compact('fetchSettings'));
    }

    	public function createTeacher(Request $request){
		if(auth::user()->role != "admin") {
			 return back()->withInput()->with('errors','Forbiden only admin can add new teacher');
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

       if(User::where('phoneNo',trim(Input::get('phoneNo')))->count() >=1){
       return back()->withInput()->with('errors','The Phone number you entered already exist');
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
            'phoneNo' => 'required|max:255',
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
		$User->gender = Input::get('gender');
		$User->studentClass = Input::get('studentClass');
		$User->address = Input::get('address');
		$User->phoneNo = Input::get('phoneNo');
		$User->role = "teacher";
		$User->birthday = Input::get('birthday');
		$User->save();
		
		if (Input::hasFile('photo')) {
			     $fileName = $request->photo->getClientOriginalName();
           $request->photo->move(public_path('upload'),$fileName);
			$User->photo =  $fileName;
			$User->save();
		}
		if($User){
		  return back()->with('success','You have successfully added a new class teacher');
		}
		
	}

	public function staffProfile(){
	$userId=Auth::user()->id;
	$fetchSettings=Generalsetting::find(1);
	$student=User::where('id',$userId)
	->first();
	// ->Where('role','admin')
	
	return view('teachers.my-profile',compact(['student','fetchSettings']));
}


}
