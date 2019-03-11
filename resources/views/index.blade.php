@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h3>ตู้กาชาปองทั้งหมด</h3>
    </div>
  </div>
  <hr>
  <div class="row">
    @foreach($gachapon as $all_gachapon)
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <img src="/assets/img/gachapon/{{$all_gachapon->gachapon_img}}" class="card-img-top" alt="gachapon_img">
        <div class="card-body">
          <h5 class="card-title">{{$all_gachapon->gachapon_name}}</h5>
          <p class="card-text">ค่าหมุน: {{$all_gachapon->gachapon_price}}</p>
          <a href="/gachapon/{{$all_gachapon->gachapon_id}}" class="btn btn-primary form-control">เข้าห้องนี้</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
