<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    public function ShowInventory(Request $request,$id) {
      $my_item = Inventory::where('user_id',$id)->orderBy('created_at','desc')->get();
      return view('pages.inventory.my-inventory',[
                                                  'my_item' => $my_item,
                                                 ]);
    }

    public function ShippingConfirm(Request $request) {

      $validatedData = $request->validate([
          'shipping_address' => 'required',
      ]);

      $shipping = Inventory::find($request->inventory_id);
      $shipping->shipping_address = $request->shipping_address;
      $shipping->save();

      return redirect()->back();
    }

    public function ShippingEdit(Request $request)  {

      $validatedData = $request->validate([
          'shipping_address' => 'required',
      ]);

      $shipping = Inventory::find($request->inventory_id);
      $shipping->shipping_address = $request->shipping_address;
      $shipping->save();

      return redirect()->back();
    }
}
