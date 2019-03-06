<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;

class AdminTokenController extends Controller
{
    public function ShowAdminToken()  {
      $token = Token::all();
      return view('admin.pages.token.token',[
                                              'token' => $token,
                                            ]);
    }

    public function ShowAdminCreateToken()  {
      return view('admin.pages.token.create-token');
    }

    public function AdminCreateTokenProcess(Request $request) {

      $validatedData = $request->validate([
          'token_name' => 'required',
          'token_pay' => 'required',
          'token_get' => 'required',
      ]);

      $token = new Token;
      $token->token_name = $request->token_name;
      $token->token_pay = $request->token_pay;
      $token->token_get = $request->token_get;
      $token->save();

      return redirect()->route('token');

    }

    public function ShowAdminEditToken($id)  {
      $token = Token::find($id);
      return view('admin.pages.token.edit-token',[
                                                  'token' => $token,
                                                 ]);
    }

    public function AdminEditTokenProcess(Request $request,$id) {

      $validatedData = $request->validate([
          'token_name' => 'required',
          'token_pay' => 'required',
          'token_get' => 'required',
      ]);

      $token = Token::find($id);
      $token->token_name = $request->token_name;
      $token->token_pay = $request->token_pay;
      $token->token_get = $request->token_get;
      $token->save();

      return redirect()->route('token');
    }

    public function AdminDeleteTokenProcess($id) {
      $token = Token::find($id);
      $token->delete();

      return redirect()->route('token');
    }

}
