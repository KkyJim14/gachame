@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h3>รายการโอนเงิน</h3>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">ยอดเงิน</th>
            <th scope="col">เวลาโอน</th>
            <th scope="col">อัพโหลดสลิป</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transfer as $all_transfer)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$all_transfer->transfer_amount}}</td>
            <td>{{$all_transfer->created_at}}</td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
