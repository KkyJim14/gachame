<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Money;

class AdminMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $money = Money::all();
        return view('admin.pages.wallet.money',[
                                                'money' => $money,
                                               ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.wallet.create-money');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'money_name' => 'required',
            'money_pay' => 'required',
            'money_get' => 'required',
        ]);

        $money = new Money;
        $money->money_name = $request->money_name;
        $money->money_pay = $request->money_pay;
        $money->money_get = $request->money_get;
        $money->save();

        return redirect()->route('money');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $money = Money::find($id);
      return view('admin.pages.wallet.edit-money',[
                                                    'money' => $money,
                                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validatedData = $request->validate([
          'money_name' => 'required',
          'money_pay' => 'required',
          'money_get' => 'required',
      ]);

      $money = Money::find($id);
      $money->money_name = $request->money_name;
      $money->money_pay = $request->money_pay;
      $money->money_get = $request->money_get;
      $money->save();

      return redirect()->route('money');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $money = Money::find($id);
        $money->delete();

        return redirect()->route('money');
    }
}
