<?php

namespace App\Listeners;

use App\Events\PaystackEvent;
use App\Mail\PaystackNotificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUserAfterPaymentListener
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

        public function sendPaymentNotificationToUser(){
           // Mail::send(new PaystackNotificationEmail());
            Mail::send(['text'=>'mail'],['name'=>'Francis'],function($message){
            $message->to('mathematicsmadeasy@gmail.com','To maths')->subject('Order Payment Detail');
            $message->from('itaforfrancis@gmail.com','From FRANCIS');
        });
}
    /**
     * Handle the event.
     *
     * @param  PaystackEvent  $event
     * @return void
     */
    public function handle(PaystackEvent $events)
    {
      //return $events;
   $this->sendPaymentNotificationToUser();

    }
}
