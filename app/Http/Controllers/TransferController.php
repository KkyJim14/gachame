<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\User;

class TransferController extends Controller
{
    public function TransferProcess(Request $request) {
      $transfer = new Transfer;
      $transfer->user_id = session('user_id');
      $transfer->transfer_amount = $request->transfer_amount;
      $transfer->transfer_approve = 0;
      $transfer->save();

      return redirect('/');
    }

    public function ShowTransferReport($user_id)  {
      $transfer = Transfer::all();
      return view('pages.transfer.transfer-report',[
                                                    'transfer' => $transfer,
                                                   ]);
    }

    public function TransferSlipProcess(Request $request) {

      if ($request->hasFile('transfer_slip')) {
        $image = $request->file('transfer_slip');
        $name = uniqid().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/slip');
        $image->move($destinationPath, $name);

        $transfer = Transfer::find($request->transfer_id);
        $transfer->transfer_slip = $name;
        $transfer->save();

        }

        return redirect()->back();

     }
}
