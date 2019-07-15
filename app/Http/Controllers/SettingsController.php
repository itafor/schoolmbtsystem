<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
use App\Feesetting;

class SettingsController extends Controller
{
	public function classSessionTerm(){
	$sessions=Session::all();
	$classes=Classes::all();
	$terms=Term::all();
	return view('fees.add-fee-amount',compact(['sessions','classes','terms']));
}
   public function feessetting(Request $request){
   	$checkFee=Feesetting::where('className',$request->className)
   	->where('sessionName',$request->sessionName)
   	->where('term',$request->term)
   	->where('feeAmount',$request->feeAmount)
   	->first();
   	if($checkFee){
   		return back()->withInput()->with('errors','Fee alread set, you can choose to edit');
			exit;
   	}
   	$val =	$this->validate($request,[
            'className' => 'required|max:255',
            'sessionName' => 'required|max:255',
            'term' => 'required|max:255',
            'feeAmount' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
		$setFee = new Feesetting();
		$setFee->className = Input::get('className');
		$setFee->sessionName = Input::get('sessionName');
		$setFee->term = Input::get('term');
		$setFee->feeAmount = Input::get('feeAmount');
		$setFee->save();
		if($setFee){
		  return back()->with('success','You have successfully added new fee settings');
		  exit();
		}
		 return back()->withInput()->with('errors','fee setting could not be added at this time, try again!');
						exit;
   }

   public function viewFeSettings(){
   	$getFeesSettings=DB::table('feesettings')->orderBy('className','desc')->paginate(10);
	return view('fees.view-fee-settings',compact(['getFeesSettings']));

   }
}
