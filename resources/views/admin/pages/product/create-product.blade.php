@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สร้างสินค้า</h3>
<div class="row">
  <div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/product" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>ชื่อสินค้า</label>
        <input class="form-control" type="text" name="product_name" value="" placeholder="กรุณากรอกชื่อสินค้า">
      </div>
      <div class="form-group">
        <label>ราคาสินค้า</label>
        <input class="form-control" type="number" name="product_price" value="" placeholder="กรุณากรอกราคาสินค้า">
      </div>
      <div class="form-group">
        <label>รูปสินค้า</label>
        <br>
        <input type="file" name="product_img" value="">
      </div>
      @csrf
      <button class="btn btn-success form-control" type="submit" name="button">สร้างสินค้า</button>
    </form>
  </div>
</div>
@endsection
