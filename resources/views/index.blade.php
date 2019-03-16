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
    <div class="col-md-4">
      <a href="/gachapon/{{$all_gachapon->gachapon_id}}">
        <!-- Normal Demo-->
          <div class="column">
            <!-- Post-->
            <div class="post-module">
              <!-- Thumbnail-->
              <div class="thumbnail"><img src="/assets/img/gachapon/{{$all_gachapon->gachapon_img}}" class="card-img-top" alt="gachapon_img">
              </div>
              <!-- Post Content-->
              <div class="post-content">
                <div class="category">{{$all_gachapon->gachapon_price}} ฿</div>
                <h1 class="title">{{$all_gachapon->gachapon_name}}</h1>
                <p>ไอเทมในกาชาปอง</p>
                @foreach($all_gachapon->role as $role)
                <h2 class="sub_title">-{{$role->product_name}}</h2>
                @endforeach
              </div>
            </div>
          </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
