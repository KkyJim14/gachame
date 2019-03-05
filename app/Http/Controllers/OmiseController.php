<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmiseController extends Controller
{
    public function OmisePay()  {

      define('OMISE_PUBLIC_KEY', 'pkey_test_5cxodoewdmtrmj4j1g4');
      define('OMISE_SECRET_KEY', 'skey_test_5cxodoewlzrw2k4dxlg');
      define('OMISE_API_VERSION', '2017-11-02');

      $charge = \OmiseCharge::create(array(
      'card' => $request->omiseToken,
      'amount' => ($request->transfer_amount.'00')*0.1,
      'currency' => 'thb',
      'description' => ''
      ));

      if ($charge['status'] == 'successful') {
        $course = Course::where('course_id',$request->course_id)->first();
        $course->course_now_joining = $course->course_now_joining+1;
        $course->save();

    }
}
