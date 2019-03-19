@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  @if ($errors->any())
      <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      </div>
  @endif
  @if(session('omise-fail'))
  <div class="alert alert-danger">
    <span>{{session('omise-fail')}}</span>
  </div>
  @endif
  <div class="row">
    <div class="col-md-6 wallet-hr">
      <h3>เงินของฉัน <span style="float:right;"><i class="fas fa-money-bill-alt"></i> {{session('user_money')}}</span> </h3>
      <hr>
      <h5>เติมเงิน</h5>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">จำนวนเงิน</th>
            <th scope="col">โอนเงิน</th>
          </tr>
        </thead>
        <tbody>
          @foreach($money as $all_money)
          <tr>
            <td>{{$all_money->money_pay}}</td>
            <td>
              <!-- Transfer Modal -->
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#transfermodal{{$all_money->money_id}}">
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
          </tr>
          @endforeach
        </tbody>
      </table>
      <h5>ระบุจำนวน (ตั้งแต่ 20 บาทขึ้นไป)</h5>
      <form action="/transfer" method="post">
        <input autocomplete="off" class="form-control" type="number" name="transfer_amount" id="transfer_amount" value="" placeholder="กรุณาระบุจำนวนเงินที่ต้องการเติม">
        @csrf
        <button class="btn btn-success form-control mt-2" type="submit" name="button">โอนเงิน</button>
      </form>
    </div>
    <div class="col-md-6 wallet-token">
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
