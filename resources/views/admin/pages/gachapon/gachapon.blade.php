@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>กาชาปอง</h3>
<a class="btn btn-success" href="/admin/gachapon/create">สร้างกาชาปอง</a>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">รูป</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">ราคาสุ่ม</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($gachapon as $all_gachapon)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td><img class="admin__table__img" src="/assets/img/gachapon/{{$all_gachapon->gachapon_img}}" alt="gachapon_img"> </td>
      <td>{{$all_gachapon->gachapon_name}}</td>
      <td>{{$all_gachapon->gachapon_price}}</td>
      <td><a class="btn btn-warning form-control" href="/admin/gachapon/{{$all_gachapon->gachapon_id}}/edit">แก้ไข</a> </td>
      <td>
        <form action="/admin/token/{{$all_gachapon->gachapon_id}}" method="post">
          @csrf
          <button class="btn btn-danger form-control" type="submit" name="button">ลบ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
