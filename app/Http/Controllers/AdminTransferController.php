<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\User;

class AdminTransferController extends Controller
{
    public function AdminShowTransfer() {
      $transfer = Transfer::all();
      return view('admin.pages.transfer.transfer',[
                                                    'transfer' => $transfer,
                                                  ]);
    }

    public function AdminApproveTransfer(Request $request,$id)  {

      $transfer = Transfer::find($id);
      $transfer->transfer_approve = $request->transfer_approve;
      $transfer->save();

      $user = User::find($request->user_id);
      $user->user_money = $user->user_money+$transfer->transfer_amount;
      $user->save();

      return redirect()->route('transfer');
    }

}
