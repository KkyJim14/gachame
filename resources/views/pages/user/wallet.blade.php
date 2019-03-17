@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6" style="border-right:1px solid gray">
      <h3>กระเป๋าตังค์ของฉัน <span style="float:right;"><i class="fas fa-money-bill-alt"></i> {{session('user_money')}}</span> </h3>
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
        <input autocomplete="off" class="form-control" type="number" name="transfer_amount" id="transfer_amount" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการเติม">
        @csrf
        <button class="btn btn-success form-control mt-2" type="submit" name="button">โอนเงิน</button>
      </form>
      <form class="checkout-form mt-2" name="checkoutForm" method="POST" action="/omise-pay">
        @csrf
        <script id="omiseScript_autoFillable" type="text/javascript" src="https://cdn.omise.co/omise.js"
                data-key="pkey_test_5cxodoewdmtrmj4j1g4"
                data-amount="500"
                data-frame-label="www.gachame.com"
                data-submit-label="ยืนยันการชำระเงิน"
                data-button-label="เติมผ่านบัตรเครดิต">
        </script>
        <script>
            function isNumber(value) {
                var x = parseFloat(value);
                return !isNaN(value) && (x | 0) === x;
            }
            $("#transfer_amount").change(function(e){
                if(isNumber($("#transfer_amount").val())){
                    $("#omiseScript_autoFillable").attr("data-amount", parseInt($("#transfer_amount").val()));
                }
            });
        </script>
      </form>
    </div>
    <div class="col-md-6">
      <h3>Token ของฉัน <span style="float:right;"><i class="fas fa-coins"></i> {{session('user_token')}}</span> </h3>
      @if(session('transfer_fail'))
        <div class="alert alert-danger">
          <span>{{session('transfer_fail')}}</span>
        </div>
      @endif
      <hr>
      <h5>แลก Token</h5>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">เงินที่ใช้แลก</th>
            <th scope="col">Token ที่ได้</th>
            <th scope="col">แลก</th>
          </tr>
        </thead>
        <tbody>
          @foreach($token as $all_token)
          <tr>
            <td>{{$all_token->token_pay}}</td>
            <td>{{$all_token->token_get}}</td>
            <td>
              <form action="/token-transfer" method="post">
                <input type="hidden" name="token_transfer" value="{{$all_token->token_id}}">
                @csrf
                <button class="btn btn-token form-control" type="submit" name="button">แลก</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h5>ระบุจำนวน (1 Token = 1 บาท)</h5>
      <form  action="/token-transfer-manual" method="post">
        <input class="form-control" type="number" name="token_transfer" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการแลก">
        @csrf
        <button class="btn btn-token form-control mt-2" type="submit" name="button">แลก Token</button>
      </form>
    </div>
  </div>
</div>
@endsection
