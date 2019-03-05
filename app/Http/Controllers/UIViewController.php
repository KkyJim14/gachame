<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Money;
use App\Token;

class UIViewController extends Controller
{
    public function ShowHomePage()  {
      return view('index');
    }

    public function ShowMember()  {

      if (session('user_log')) {
        return redirect('/');
      }

      else {
        return view('pages.user.member');
      }
    }

    public function ShowWallet($user_id)  {

      if (session('user_id') == $user_id) {
        $user = User::find(session('user_id'));
        $money = Money::all();
        $token = Token::all();
        return view('pages.user.wallet',[
                                          'user' => $user,
                                          'money' => $money,
                                          'token' => $token,
                                        ]);
      }

      else {
        abort(404);
      }

    }



}
