<?php

namespace App\Listeners;

use App\Events\PaystackEvent;
use App\Transaction;
//use Illuminate\Auth\Middleware\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class SavePaymentDetailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaystackEvent  $event
     * @return void
     */
    public function handle(PaystackEvent $events)
    {
              $saveTrans = new Transaction();
              $saveTrans->email =$events->user->email;
              $saveTrans->user_id = $events->user->id;
              $saveTrans->paystack_reference =$events->paymentDetail['data']['reference'];
              $saveTrans->amount =$events->paymentDetail['data']['amount'];
              $saveTrans->quantity = 12;
              $saveTrans->order_id = $events->paymentDetail['data']['order_id'];
              $saveTrans->save();
       
if($saveTrans){
    //return response()->json(['success'=>'details saved in database successfully'],201);
  dd('details saved in database successfully');
    }else{
   // return response()->json(['error'=>'An attempt to save payment details to database failed'],401);
    dd('details saved in database successfully');
    }
}
}
