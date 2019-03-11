<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\User;

class AdminTransferController extends Controller
{
    public function AdminShowTransfer() {
      $transfer = Transfer::where('transfer_slip','!=',null)->where('transfer_approve','0')->orderBy('created_at','asc')->get();
      return view('admin.pages.transfer.transfer',[
                                                    'transfer' => $transfer,
                                                  ]);
    }

    public function AdminShowTransferAll()  {
      $transfer = Transfer::all();
      return view('admin.pages.transfer.transfer-all',[
                                                    'transfer' => $transfer,
                                                  ]);
    }

    public function AdminApproveTransfer(Request $request,$id)  {

      $transfer = Transfer::find($id);
      $transfer->transfer_approve = $request->transfer_approve;
      $transfer->save();

      if ($request->transfer_approve == 2) {
        $user = User::find($request->user_id);
        $user->user_money = $user->user_money+$transfer->transfer_amount;
        $user->save();

        $request->session()->put('user_money', $user->user_money);
      }

      return redirect()->route('transfer');
    }

}
