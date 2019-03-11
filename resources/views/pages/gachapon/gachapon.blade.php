@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8">
      <div class="gachapon">
        <figure class="figure">
          <img src="/assets/img/gachapon/{{$gachapon->gachapon_img}}" class="figure-img img-fluid rounded" alt="gachapon_img">
        </figure>
        <hr>
        @if(session('random-success-rare'))
          <div class="alert alert-success">
            <span>{{session('random-success-rare')}}</span>
          </div>
        @endif
        @if(session('random-success-normal'))
          <div class="alert alert-primary">
            <span>{{session('random-success-normal')}}</span>
          </div>
        @endif
        @if(session('random-fail'))
          <div class="alert alert-danger">
            <span>{{session('random-fail')}}</span>
          </div>
        @endif
        @if($all_product_qty == 0)
          <button class="btn btn-danger form-control disabled" name="button">ของรางวัลหมด</button>
        @elseif(session('user_log') == null)
          <a class="btn btn-primary form-control" href="/member">กรุณาสมัครสมาชิกก่อน</a>
        @elseif(session('user_token') < $gachapon->gachapon_price)
          <a class="btn btn-warning form-control" href="/wallet/{{session('user_id')}}">Token ของคุณไม่เพียงพอ | เติมเงินที่นี่ !!</a>
        @else
        <form action="/gachapon/{{$gachapon->gachapon_id}}/random" method="post">
          @csrf
            <button class="btn btn-success form-control" type="submit" name="button">หมุนกาชาปอง !!</button>
        </form>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <h3>Token ของฉัน : @if(session('user_log')){{session('user_token')}} <i class="fas fa-coins"></i> @else <a class="btn btn-primary form-control mt-2" href="/member">กรุณาสมัครสมาชิกก่อน</a> @endif</h3>
      <hr>
      <h3>{{$gachapon->gachapon_name}}</h3>
      <h5>ค่าหมุน: {{$gachapon->gachapon_price}} <i class="fas fa-coins"></i></h5>
      <h5>จำนวนสินค้าทั้งหมด: {{$all_product_qty}}</h5>
      <h5>จำนวนสินค้าแรร์: {{$rare_product_qty}}</h5>
      <h5>จำนวนสินค้าธรรมดา: {{$normal_product_qty}}</h5>
      <h5>โอกาศหมุนได้ของแรร์: {{$rare_chance}}%</h5>
    </div>
  </div>
</div>
@endsection
