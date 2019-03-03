<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.user.wallet');
      }

      else {
        abort(404);
      }

    }



}
