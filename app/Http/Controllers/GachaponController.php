<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gachapon;
use App\Role;
use App\Product;
use App\User;

class GachaponController extends Controller
{
    public function ShowGachapon($id)  {
      $gachapon = Gachapon::find($id);
      $all_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->sum('role_qty');
      $rare_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',true)->sum('role_qty');
      $normal_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',false)->sum('role_qty');
      $user = User::find(session('user_id'));

      if ($all_product_qty == 0) {
        $rare_chance = 0;
      }
      else {
        $rare_chance = round(($rare_product_qty/$all_product_qty)*100);
      }
      return view('pages.gachapon.gachapon',[
                                              'gachapon' => $gachapon,
                                              'all_product_qty' => $all_product_qty,
                                              'rare_product_qty' => $rare_product_qty,
                                              'normal_product_qty' => $normal_product_qty,
                                              'rare_chance' => $rare_chance,
                                              'user' => $user,
                                            ]);
    }

    public function GachaponRandom(Request $request,$id)  {
      $gachapon = Gachapon::find($id);
      $all_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->sum('role_qty');

      if ($all_product_qty == 0) {
        return redirect()->back()->with('random-fail','ไอเทมหมด');
      }

      $rare_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',true)->sum('role_qty');
      $normal_product_qty = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',false)->sum('role_qty');
      $rare_chance = round(($rare_product_qty/$all_product_qty)*100);
      $random = rand(1,$all_product_qty);
      $rare_product = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',true)->first();
      $normal_product = Role::where('gachapon_id',$gachapon->gachapon_id)->where('role_rare',false)->first();


      $user = User::find(session('user_id'));
      if ($user->user_token < $gachapon->gachapon_price) {
        return redirect()->back()->with('random-fail','token ของคุณไม่เพียงพอ');
      }
      else {
        $user->user_token = $user->user_token-$gachapon->gachapon_price;
        $user->save();

        $request->session()->put('user_token', $user->user_token);

        if($random <= $rare_product_qty) {
          $rare_product->role_qty = $rare_product->role_qty-1;
          $rare_product->save();

          return redirect()->back()->with('random-success-rare',"ได้ไอเทมแรร์");
        }
        else {
          $normal_product->role_qty = $normal_product->role_qty-1;
          $normal_product->save();

          return redirect()->back()->with('random-success-normal',"ได้ไอเทมธรรมดา");
        }
      }

    }
}
