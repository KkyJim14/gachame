<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Money;

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
        return view('pages.user.wallet',[
                                          'user' => $user,
                                          'money' => $money,
                                        ]);
      }

      else {
        abort(404);
      }

    }



}
