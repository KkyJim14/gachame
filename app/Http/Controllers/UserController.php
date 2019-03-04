<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

class UserController extends Controller
{
    public function RegisterProcess(Request $request) {

      $validatedData = $request->validate([
        'register_fname' => 'required|max:255',
        'register_lname' => 'required|max:255',
        'register_email' => 'required|email|max:255|unique:user,user_email',
        'register_password' => 'required|max:255',
        'register_re_password' => 'required|same:register_password',
        'register_birthdate' => 'required',
        'register_gender' => 'required',
      ]);

      $user = new User;
      $user->user_fname = $request->register_fname;
      $user->user_lname = $request->register_lname;
      $user->user_email = $request->register_email;
      $user->user_password = Hash::make($request->register_password);
      $user->user_birthdate = $request->register_birthdate;
      $user->user_gender = $request->register_gender;
      $user->user_tel = $request->register_tel;
      $user->user_img = 'profile.png';
      $user->user_money = 0;
      $user->user_token = 0;
      $user->save();

      session([
                'user_log' => '1',
                'user_id' => $user->user_id,
                'user_fname' => $user->user_fname,
                'user_lname' => $user->user_lname,
                'user_email' => $user->user_email,
                'user_img' => $user->user_img,
                'user_money' => $uesr->user_money,
                'user_token' => $user->user_token,
              ]);

      return redirect()->back();
    }

    public function LoginProcess(Request $request)  {

      $validatedData = $request->validate([
        'login_email' => 'required|email|max:255',
        'login_password' => 'required|max:255',
      ]);

      if (User::where('user_email',$request->login_email)->count() == 1) {
        $user = User::where('user_email',$request->login_email)->first();
        if (Hash::check($request->login_password,$user->user_password)) {

          session([
                    'user_log' => '1',
                    'user_id' => $user->user_id,
                    'user_fname' => $user->user_fname,
                    'user_lname' => $user->user_lname,
                    'user_email' => $user->user_email,
                    'user_img' => $user->user_img,
                    'user_money' => $user->user_money,
                    'user_token' => $user->user_token,
                  ]);

          return redirect()->back();
        }
        else {
          return redirect()->back()->with('login_fail','อีเมลล์ หรือ รหัสผ่าน ผิด');
        }
      }
      else {
        return redirect()->back()->with('login_fail','อีเมลล์ หรือ รหัสผ่าน ผิด');
      }

    }

    public function LogoutProcess(Request $request) {

      $request->session()->flush();
      $request->session()->regenerate();

      return redirect()->back();
    }
}
