<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmiseController extends Controller
{
    public function OmisePay(Request $request)  {

      define('OMISE_PUBLIC_KEY', 'pkey_test_5cxodoewdmtrmj4j1g4');
      define('OMISE_SECRET_KEY', 'skey_test_5cxodoewlzrw2k4dxlg');
      define('OMISE_API_VERSION', '2017-11-02');

      $charge = \OmiseCharge::create(array(
      'card' => $request->omiseToken,
      'amount' => 50000,
      'currency' => 'thb',
      'description' => ''
      ));

      if ($charge['status'] == 'successful') {
        return redirect()->bacK();
      }
    }
}
