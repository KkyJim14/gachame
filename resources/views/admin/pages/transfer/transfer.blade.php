@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สลิปรอตรวจสอบ</h3>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อคนโอน</th>
      <th scope="col">จำนวนเงินที่โอน</th>
      <th scope="col">สลิป</th>
      <th scope="col">ยืนยัน</th>
    </tr>
  </thead>
  <tbody>
    @foreach($transfer as $all_transfer)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$all_transfer->user->user_fname}} {{$all_transfer->user->user_lname}}</td>
      <td>{{$all_transfer->transfer_amount}}</td>
      <td><img src="/assets/img/slip/{{$all_transfer->transfer_slip}}" alt="slip_transfer" style="width:100px; height:100px;"> </td>
      <td>
        <form action="/admin/transfer/{{$all_transfer->transfer_id}}/edit" method="post">
          <input type="hidden" name="transfer_approve" value="2">
          <input type="hidden" name="user_id" value="{{$all_transfer->user_id}}">
          @csrf
          <button class="btn btn-success form-control mb-2">ยืนยัน</button>
        </form>
        <form action="/admin/transfer/{{$all_transfer->transfer_id}}/edit" method="post">
          <input type="hidden" name="transfer_approve" value="1">
          <input type="hidden" name="user_id" value="{{$all_transfer->user_id}}">
          @csrf
          <button class="btn btn-danger form-control">ปฎิเสธ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
