<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Classes;
use Session;

class ClassesController extends Controller
{
  public function listAll()
	{
		
	}

	public function displayClassForm(){
        return view('admin.add-class');
	}

	public function createClass(Request $request){
		$class=Classes::where('className', $request->className)->first();
		if($class){
       return back()->withInput()->with('errors','The class you are about to add already exist');
		}
		$classes = new Classes();
		$classes->className = Input::get('className');
		$classes->classTeacher = json_encode(Input::get('classTeacher'));
		$classes->save();
		  if($classes){
         return back()->with('success','You have successfully add a new class');
 
        }
        return back()->withInput()->with('errors','An attempt to add a new class failed');
	}
}
