<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OmiseController extends Controller
{
    public function OmisePay(Request $request)  {

      if (session('user_log')) {
        $validatedData = $request->validate([
          'transfer_omise' => 'required',
        ]);

        if ($request->transfer_omise < 20) {
          return redirect()->back()->with('omise-fail','กรุณาใส่จำนวนมากกว่า 20 บาท');
        }
        else {
          define('OMISE_PUBLIC_KEY', 'pkey_test_5cxodoewdmtrmj4j1g4');
          define('OMISE_SECRET_KEY', 'skey_test_5cxodoewlzrw2k4dxlg');
          define('OMISE_API_VERSION', '2017-11-02');

          $charge = \OmiseCharge::create(array(
          'card' => $request->omiseToken,
          'amount' => (integer) $request->transfer_omise.'00',
          'currency' => 'thb',
          'description' => ''
          ));

          if ($charge['status'] == 'successful') {
            $user = User::find(session('user_id'));
            $user->user_money = $user->user_money+$request->transfer_omise;
            $user->save();
            $request->session()->put('user_money',$user->user_money);
            return redirect()->bacK();
          }
        }
      }
      else {
        return redirect()->route('member')->with('transfer-fail','กรุณาสมัครสมาชิกก่อน')
      }
    }
}
