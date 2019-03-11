<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gachapon;
use App\Product;
use App\Role;

class AdminProductInGachaponController extends Controller
{
    public function ShowAdminProductInGachapon()  {
      $role = Role::all();
      return view('admin.pages.product-in-gachapon.product-in-gachapon',[
                                                                          'role' => $role,
                                                                        ]);
    }

    public function ShowAdminCreateProductInGachapon()  {
      $gachapon = Gachapon::all();
      $product = Product::all();
      return view('admin.pages.product-in-gachapon.create-product-in-gachapon',[
                                                                                'gachapon' => $gachapon,
                                                                                'product' => $product,
                                                                               ]);
    }

    public function AdminCreateProductInGachaponProcess(Request $request) {

      $validatedData = $request->validate([
          'gachapon_id' => 'required',
          'product_id' => 'required',
          'role_qty' => 'required',
      ]);

      $role = new Role;
      $role->gachapon_id = $request->gachapon_id;
      $role->product_id = $request->product_id;
      $role->role_qty = $request->role_qty;
      $role->save();

      return redirect()->route('product-in-gachapon');
    }

    public function ShowAdminEditProductInGachapon($id) {
      $gachapon = Gachapon::all();
      $product = Product::all();
      $role = Role::find($id);
      return view('admin.pages.product-in-gachapon.edit-product-in-gachapon',[
                                                                              'gachapon' => $gachapon,
                                                                              'product' => $product,
                                                                              'role' => $role,
                                                                             ]);
    }

    public function AdminEditProductInGachaponProcess(Request $request,$id) {

      $validatedData = $request->validate([
          'gachapon_id' => 'required',
          'product_id' => 'required',
          'role_qty' => 'required',
      ]);

      $role = Role::find($id);
      $role->gachapon_id = $request->gachapon_id;
      $role->product_id = $request->product_id;
      $role->role_qty = $request->role_qty;
      $role->save();

      return redirect()->route('product-in-gachapon');
    }

    public function AdminDeleteProductInGachaponProcess(Request $request,$id) {
      $role = Role::find($id);
      $role->delete();

      return redirect()->route('product-in-gachapon');
    }
}
