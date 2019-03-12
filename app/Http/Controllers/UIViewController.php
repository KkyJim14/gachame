<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Money;
use App\Token;
use App\Gachapon;

class UIViewController extends Controller
{
    public function ShowHomePage()  {
      $gachapon = Gachapon::all();
      return view('index',[
                            'gachapon' => $gachapon,
                          ]);
    }

    public function ShowMember()  {

      if (session('user_log')) {
        return redirect('/');
      }

      else {
        return view('pages.user.member');
      }
    }

    public function ShowWallet()  {

        $money = Money::all();
        $token = Token::all();
        return view('pages.user.wallet',[
                                          'money' => $money,
                                          'token' => $token,
                                        ]);


    }



}
