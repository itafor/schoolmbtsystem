<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\traits\Nexmo;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


class VerificationController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('verify');
        $this->middleware('signed')->only('verify');
//        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        if (!User::find($request->route('id'))) {
            return response()->json(['error'=>'Unauthorised']);
        }

        if (User::find($request->route('id'))->hasVerifiedEmail()) {
            return response()->json('Email already verified');
        }

        if (User::find($request->route('id'))->markEmailAsVerified()) {
            // event(new Verified(User::find($request->route('id'))));
            return redirect(config('app.web_app_url') . "/login");
        }
    }


    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'User already have verified email!'], 200);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Email Verification sent!'], 200);
    }

    public function phoneVerify(Request $request)
    {
        //https://developer.nexmo.com/api/verify#check
        return Nexmo::check($request->query('request_id'), $request->query('code'), $request->user());
    }
}
