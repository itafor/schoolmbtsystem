<?php 
namespace App\traits;

trait Nexmo {
	public static function sendcode($phone)
  {

    // $vendor = $this->vendor->find(auth()->user()->id) or auth()->user();
    try{
      $basic  = new \Nexmo\Client\Credentials\Basic(config('app.nexmo.key'), config('app.nexmo.secret'));
      $client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Container($basic));
      $verification = new \Nexmo\Verify\Verification($phone, 'Kiitec Reg No', ['country'=>'NG']);
      $client->verify()->start($verification);
      $req_id = $verification->getRequestId();
      return $req_id;
    }catch(\Nexmo\Client\Exception\Request $e){
      return response()->json($e->getMessage());
    }

  }


  public static function check($req_id, $code, $user=null)
  {
    try {
      $basic  = new \Nexmo\Client\Credentials\Basic(config('app.nexmo.key'), config('app.nexmo.secret'));
      $client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Container($basic));

      $verification = $client->verify()->check($req_id, $code);

      // $vendor = $this->vendor->find(auth()->user()->id) or auth()->user();

      $user->update(['phone_verified_at' => \Carbon\Carbon::now()]);
      return json_encode(['success'=>'phone verified']);
    } catch (\Nexmo\Client\Exception\Request $e) {
      $verification = $e->getEntity();
      return json_encode(['error'=>$verification['error_text']]);
    }
  }

}
?>