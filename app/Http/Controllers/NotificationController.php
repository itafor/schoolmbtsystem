<?php

namespace App\Http\Controllers;

use App\Generalsetting;
use App\Notifications\EventsNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\paginate;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{

	public function newNotification(){
 		 $fetchSettings=Generalsetting::find(1);

		return view('students.add-event',compact(['fetchSettings']));
	}
    
   public function sendNotification(Request $request){

     $delayTime=Carbon::now()->addSeconds(2);
     
    $users = User::paginate(5);

    $events=[
        'greeting'=>$request->eventSubject,
        'body'=>$request->eventBody
    ];

    if($users){
        foreach ($users as $key => $user) {
           $details = [
            'greeting' => $request->eventSubject,
            'body' => $request->eventBody,
            'actionText' => 'View Notification',
            'actionUrl' => url('/view-notification')
    ];

    $user->notify((new EventsNotification($details,$events))->delay($delayTime));

     }
}
      return back()->with('success','Notifications sent!');
			exit; 
 }
 public function viewNotification($id){
 	$fetchSettings=Generalsetting::find(1);
 	$notification=auth()->user()->notifications->find($id);

	auth()->user()->Notifications->find($id) ? auth()->user()->Notifications->find($id)->markAsRead() : '';

 	return view('students.read-notification',compact(['notification','fetchSettings']));
 }

 public function markAsRead(){
 	auth()->user()->unReadNotifications->markAsRead();
      return back()->with('success','Notification successfully marked as read!');
 }

public function allNotification($id){
	$fetchSettings=Generalsetting::find(1);
 	$notification=auth()->user()->notifications->find($id);
 	return view('students.all-notification',compact(['notification','fetchSettings']));

}
 public function deleteNotification($id){

 	if(auth()->user()->Notifications->find($id)->delete()){
      return back()->with('success','Notification deleted successfully!');
 	}
      return back()->with('error','An attempt to delete Notification failed!');
 }
}
