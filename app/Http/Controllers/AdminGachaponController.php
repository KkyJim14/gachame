<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gachapon;

class AdminGachaponController extends Controller
{
    public function ShowAdminGachapon() {
      $gachapon = Gachapon::all();
      return view('admin.pages.gachapon.gachapon',[
                                                    'gachapon' => $gachapon,
                                                  ]);
    }

    public function ShowAdminCreateGachapon() {
      return view('admin.pages.gachapon.create-gachapon');
    }

    public function AdminCreateGachaponProcess(Request $request) {

      $validatedData = $request->validate([
          'gachapon_name' => 'required',
          'gachapon_price' => 'required',
          'gachapon_img' => 'required|image|max:2048',
      ]);

      $gachapon = new Gachapon;
      $gachapon->gachapon_name = $request->gachapon_name;
      $gachapon->gachapon_price = $request->gachapon_price;

      if ($request->hasFile('gachapon_img')) {
        $image = $request->file('gachapon_img');
        $name = uniqid().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/gachapon');
        $image->move($destinationPath, $name);

        $gachapon->gachapon_img = $name;

        }

        $gachapon->save();

        return redirect()->route('gachapon');

    }
}
