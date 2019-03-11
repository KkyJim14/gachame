@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สินค้าในกาชาปอง</h3>
<a class="btn btn-success" href="/admin/product-in-gachapon/create">สร้างสินค้าในกาชาปอง</a>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ชื่อตู้</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scopr="col">แรร์</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($role as $all_role)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$all_role->gachapon->gachapon_name}}</td>
      <td>{{$all_role->product->product_name}}</td>
      <td>{{$all_role->role_qty}}</td>
      @if($all_role->role_rare == true)
      <td>
        <i class="fas fa-check-circle"></i>
      </td>
      @else
      <td>
        <i class="fas fa-times-circle"></i>
      </td>
      @endif
      <td><a class="btn btn-warning form-control" href="/admin/product-in-gachapon/{{$all_role->role_id}}/edit">แก้ไข</a> </td>
      <td>
        <form action="/admin/product-in-gachapon/{{$all_role->role_id}}" method="post">
          @csrf
          <button class="btn btn-danger form-control" type="submit" name="button">ลบ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
