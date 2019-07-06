<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Classes;
use Session;
use App\User;
class ClassesController extends Controller
{
  public function listAll()
	{
		
	}

	public function displayClassForm(){
		$getClassTeacher=User::where('role','teacher')->get();
        return view('classes.add-class',compact(['getClassTeacher']));
	}

	public function createClass(Request $request){

		$val =	$this->validate($request,[
            'className' => 'required|max:255',
            'classTeacher' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
 		
		$class=Classes::where('className', $request->className)->first();
		if($class){
       return back()->withInput()->with('errors','The class you are about to add already exist');
		}

		
		$classes = new Classes();
		$classes->className = Input::get('className');
		$classes->classTeacher = Input::get('classTeacher');
		$classes->save();
		  if($classes){
         return back()->with('success','You have successfully added a new class');
 
        }
        return back()->withInput()->with('errors','An attempt to add a new class failed');
	}

	public function findTeacher($id){
		$teacher =Classes::where('classTeacher',$id)->first();
		if($teacher){
		return $teacher;
		// back()->withInput()->with('errors','The selected teacher has been assigned to a class')
	}
}
}
