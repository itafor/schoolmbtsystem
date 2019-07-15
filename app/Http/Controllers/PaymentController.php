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
use App\Feehistory;
use Carbon\Carbon;

class PaymentController extends Controller
{
   public function selectStudent($id){
	$sessions=Session::all();
	$classes=Classes::all();
	$terms=Term::all();
	$sudentdetail=User::where('id',$id)->first();
	return view('fees.paymenthistory',compact(['sessions','classes','terms','sudentdetail']));
}

public function fetctFeeAmount($feeclassName,$feesessionName,$feeterm){
		$feeAMT=Feesetting::where('className',$feeclassName) 
				->where('sessionName',$feesessionName)
				->where('term',$feeterm)
				->first();
				if($feeAMT){
					return $feeAMT;
				}
				return '';
}
public function fetchFeeBal($feeclassName,$feesessionName,$feeterm,$id){
		$bal=Feehistory::where('className',$feeclassName) 
				->where('sessionName',$feesessionName)
				->where('term',$feeterm)
				->where('user_id',$id)
 			    ->orderBy('datePaid','DESC')->first();
				if($bal){
					return $bal;
				}
				return '';
}

public function recordPayment(Request $request){
	$otherItem=$request->otherItem;
	$itemType=$request->item;
   	$checkFeehistory=Feehistory::where('className',$request->className)
   	->where('sessionName',$request->sessionName)
   	->where('term',$request->term)
   	->where('amountPaid',$request->amountPaid)
   	->where('user_id',$request->user_id)
   	->first();
   	if($checkFeehistory){
   		return back()->withInput()->with('errors','Payment already recorded, you can choose to edit');
			exit;
   	}
   	$val =	$this->validate($request,[
            'className' => 'required|max:255',
            'sessionName' => 'required|max:255',
            'term' => 'required|max:255',
            'feeAmount' => 'required|max:255',
            'amountPaid' => 'required|max:255',
            'balance' => 'required|max:255',
            'item' => 'required|max:255',
            'user_id' => 'required|max:255',
            'feestatus' => 'required|max:255',
            ]);
 		if(!$val){
 			 return back()->withInput()->with('errors',$val);
			exit;
 		}
		$recordfee = new Feehistory();
		$recordfee->className = Input::get('className');
		$recordfee->sessionName = Input::get('sessionName');
		$recordfee->term = Input::get('term');
		$recordfee->feeAmount = Input::get('feeAmount');
		$recordfee->amountPaid = Input::get('amountPaid');
		$recordfee->balance = Input::get('balance');
		$recordfee->item = $itemType == 'Others' ? Input::get('otherItem') : Input::get('item');
		$recordfee->user_id = Input::get('user_id');
		$recordfee->status = Input::get('feestatus');
		$recordfee->datePaid =Carbon::now();

		$recordfee->save();
		if($recordfee){
		  return back()->with('success','payment recorded successfully');
		  exit();
		}
		 return back()->withInput()->with('errors','An attempt to record paymentfailed. try again!');
						exit;
   }
   public function studentPaymentHistory($id){
   	$studentPaymentHistories=Feehistory::where('user_id',$id)
   	->orderBy('datePaid','ASC')->paginate(20);
   	$studentDetail=User::where('id',$id)->first();
	return view('fees.student-payment-history',compact(['studentPaymentHistories','studentDetail']));
   }

 public function showPaymentHistoryByClass($classes){

  	$generalpaymentHistory=User::join('feehistories','users.id','=','feehistories.user_id')
        ->selectRaw('users.firstName, users.id, users.lastName, users.gender,users.phoneNo,users.address,users.photo,users.email,feehistories.term,feehistories.sessionName, feehistories.className,feehistories.feeAmount,feehistories.amountPaid,feehistories.item,feehistories.balance,feehistories.status,feehistories.datePaid,feehistories.user_id, feehistories.created_at,feehistories.id
        ')
   ->where('feehistories.className',$classes)
   ->orderBy('datePaid','ASC')
   ->paginate(20);

   	$theClass=Feehistory::where('className',$classes)
   ->first();
   	$classes=Classes::all();
	return view('fees.view-payment-history',compact(['generalpaymentHistory','classes','theClass']));
   }

  public function allPaymentHistory(){
  	$generalpaymentHistory=User::join('feehistories','users.id','=','feehistories.user_id')
        ->selectRaw('users.firstName, users.id, users.lastName, users.gender,users.phoneNo,users.address,users.photo,users.email,feehistories.term,feehistories.sessionName, feehistories.className,feehistories.feeAmount,feehistories.amountPaid,feehistories.item,feehistories.balance,feehistories.status,feehistories.datePaid,feehistories.user_id, feehistories.created_at,feehistories.id
        ')
   ->orderBy('datePaid','ASC')
   ->paginate(20);
  	$classes=Classes::all();
  	$allClasses='All Classes';
	return view('fees.view-payment-history',compact(['generalpaymentHistory','classes','allClasses']));

   }
}
