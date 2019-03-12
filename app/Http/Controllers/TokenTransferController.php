<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;
use App\User;

class TokenTransferController extends Controller
{
    public function TokenTransferProcess(Request $request)  {
      $token = Token::find($request->token_transfer);
      $user = User::find(session('user_id'));
      if ($user->user_money < $token->token_pay) {
        return redirect()->back()->with('transfer_fail','จำนวนเงินคุณไม่พอ');
      }
      else {
        $user->user_money = $user->user_money-$token->token_pay;
        $user->user_token = $user->user_token+$token->token_get;
        $user->save();

        $request->session()->put('user_money', $user->user_money);
        $request->session()->put('user_token', $user->user_token);

        return redirect()->back();
      }
    }

    public function TokenTransferManualProcess(Request $request)  {
      $user = User::find(session('user_id'));
      if ($user->user_money < $request->token_transfer) {
        return redirect()->back()->with('transfer_fail','จำนวนเงินคุณไม่พอ');
      }
      else {
        $user->user_money = $user->user_money-$request->token_transfer;
        $user->user_token = $user->user_token+$request->token_transfer;
        $user->save();

        $request->session()->put('user_money', $user->user_money);
        $request->session()->put('user_token', $user->user_token);

        return redirect()->back();
      }
    }
}
