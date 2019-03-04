@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>การแลกเงิน</h3>
<a class="btn btn-success" href="/admin/money/create">สร้างการแลกเงิน</a>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">เงินที่จ่าย</th>
      <th scope="col">เงินที่ได้</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($money as $all_money)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$all_money->money_name}}</td>
      <td>{{$all_money->money_pay}}</td>
      <td>{{$all_money->money_get}}</td>
      <td><a class="btn btn-warning form-control" href="/admin/money/{{$all_money->money_id}}/edit">แก้ไข</a> </td>
      <td>
        <form action="/admin/money/{{$all_money->money_id}}" method="post">
          @csrf
          <button class="btn btn-danger form-control" type="submit" name="button">ลบ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
