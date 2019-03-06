@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สินค้า</h3>
<a class="btn btn-success" href="/admin/product/create">สร้างสินค้า</a>
<hr>
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">รูป</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">ราคา</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $all_product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td><img class="admin__table__img" src="/assets/img/product/{{$all_product->product_img}}" alt="product_img"> </td>
      <td>{{$all_product->product_name}}</td>
      <td>{{$all_product->product_price}}</td>
      <td><a class="btn btn-warning form-control" href="/admin/product/{{$all_product->product_id}}/edit">แก้ไข</a> </td>
      <td>
        <form action="/admin/product/{{$all_product->product_id}}" method="post">
          @csrf
          <button class="btn btn-danger form-control" type="submit" name="button">ลบ</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
