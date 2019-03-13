<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class AdminShippingController extends Controller
{
    public function ShowAdminShipping() {
      $shipping = Inventory::whereNotNull('shipping_address')->where('inventory_transfer',false)->get();
      return view('admin.pages.shipping.shipping',[
                                                    'shipping' => $shipping
                                                  ]);
    }

    public function AdminShippingApprove(Request $request)  {
      $shipping = Inventory::find($request->inventory_id);
      $shipping->inventory_transfer = true;
      $shipping->save();

      return redirect()->back();
    }
}
