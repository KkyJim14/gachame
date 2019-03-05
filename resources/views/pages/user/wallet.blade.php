@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6" style="border-right:1px solid black;">
      <h3>กระเป๋าตังค์ของฉัน <span style="float:right;"><i class="fas fa-money-bill-alt"></i> {{$user->user_money}}</span> </h3>
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
          @foreach($money as $all_money)
          <tr>
            <td>{{$all_money->money_pay}}</td>
            <td>
              <!-- Transfer Modal -->
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#transfermodal{{$all_money->money_id}}">
                  โอนเงิน
                </button>

                <!-- Modal -->
                <div class="modal fade" id="transfermodal{{$all_money->money_id}}" tabindex="-1" role="dialog" aria-labelledby="transfermodal{{$all_money->money_id}}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เติมเงิน {{$all_money->money_pay}} บาท</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        023-116882-6 กสิกร ปิยะกานตร์ นิมมากุลวิรัตน์
                      </div>
                      <div class="modal-footer">
                        <form action="/transfer" method="post">
                          <input type="hidden" name="transfer_amount" value="{{$all_money->money_pay}}">
                          @csrf
                          <button class="btn btn-success form-control" type="submit" name="button">ยืนยันการโอนเงิน</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End Transfer Modal -->
            </td>
            <td><a class="btn btn-primary form-control" href="">ชำระผ่านบัตรเครดิต</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h5>ระบุจำนวน</h5>
      <form action="/transfer" method="post">
        <input class="form-control" type="number" name="transfer_amount" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการเติม">
        @csrf
        <button class="btn btn-success form-control mt-2" type="submit" name="button">โอนเงิน</button>
      </form>
      <form class="checkout-form mt-2" name="checkoutForm" method="POST" action="/checkout">
        <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                data-key="pkey_test_5cxodoewdmtrmj4j1g4"
                data-amount="{{}}"
                data-frame-label="www.gachame.com"
                data-submit-label="ยืนยันการชำระเงิน"
                data-button-label="เติมผ่านบัตรเครดิต">
        </script>
      </form>
    </div>
    <div class="col-md-6">
      <h3>Token ของฉัน <span style="float:right;"><i class="fas fa-coins"></i> {{$user->user_token}}</span> </h3>
      <hr>
      <h5>แลก Token</h5>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Token ที่ได้</th>
            <th scope="col">เงินที่ใช้แลก</th>
            <th scope="col">แลก</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>50</td>
            <td>500</td>
            <td><a class="btn btn-primary form-control" href="#">แลก</a></td>
          </tr>
        </tbody>
      </table>
      <h5>ระบุจำนวน (1 Token = 10 บาท)</h5>
      <input class="form-control" type="number" name="manual_pay" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการแลก">
      <a class="btn btn-primary form-control mt-2" href="#">ยืนยันการแลก Token</a>
    </div>
  </div>
</div>
@endsection
