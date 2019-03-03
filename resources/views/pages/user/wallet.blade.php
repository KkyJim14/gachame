@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6" style="border-right:1px solid black;">
      <h3>กระเป๋าตังค์ของฉัน <span style="float:right;"><i class="fas fa-money-bill-alt"></i> 503</span> </h3>
      <hr>
      <h5>เติมเงิน</h5>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">จำนวนเงิน</th>
            <th scope="col">โอนเงิน</th>
            <th scope="col">บัตรเครดิต</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>500</td>
            <td><a class="btn btn-success form-control mb-2" href="#">โอนเงิน</a></td>
            <td><a class="btn btn-primary form-control" href="#">ชำระผ่านบัตรเครดิต</a></td>
          </tr>
        </tbody>
      </table>
      <h5>ระบุจำนวน</h5>
      <input class="form-control" type="number" name="manual_pay" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการเติม">
      <a class="btn btn-success form-control mt-2" href="#">โอนเงิน</a>
      <a class="btn btn-primary form-control mt-2" href="#">ชำระผ่านบัตรเครดิต</a>
    </div>
    <div class="col-md-6">
      <h3>Token ของฉัน <span style="float:right;"><i class="fas fa-coins"></i> 503</span> </h3>
      <hr>
    </div>
  </div>
</div>
@endsection
