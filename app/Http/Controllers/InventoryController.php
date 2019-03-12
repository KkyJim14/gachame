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
}
