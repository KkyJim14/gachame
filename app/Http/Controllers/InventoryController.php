<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    public function ShowInventory(Request $request,$id) {
      if (session('user_id') == $id) {
        $my_item = Inventory::where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('pages.inventory.my-inventory',[
                                                    'my_item' => $my_item,
                                                   ]);
      }
      else {
        return redirect('/');
      }
    }

    public function ShippingConfirm(Request $request) {

      $validatedData = $request->validate([
          'shipping_address' => 'required',
      ]);

      $shipping = Inventory::find($request->inventory_id);

      if ($shipping) {
        if (session('user_id') == $shipping->user_id) {
          $shipping->shipping_address = $request->shipping_address;
          $shipping->save();

          return redirect()->back();
        }
        else {
          return redirect('/');
        }
      }

      else {
        return redirect('/');
      }

    }

    public function ShippingEdit(Request $request)  {

      $validatedData = $request->validate([
          'shipping_address' => 'required',
      ]);

      $shipping = Inventory::find($request->inventory_id);

      if ($shipping) {
        if (session('user_id') == $shipping->user_id) {
          $shipping->shipping_address = $request->shipping_address;
          $shipping->save();

          return redirect()->back()->with('edit-success','แก้ไขการจัดส่งสำเร็จ');
        }
        else {
          return redirect('/');
        }
      }

      else {
        return redirect('/');
      }
    }
}
