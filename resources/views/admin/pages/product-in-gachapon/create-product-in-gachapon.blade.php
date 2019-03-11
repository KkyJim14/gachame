@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สร้างสินค้าในกาชาปอง</h3>
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
    <form action="/admin/product-in-gachapon" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>กาชาปอง</label>
        <select class="form-control" name="gachapon_id">
            <option value="">กรุณาเลือกกาชาปอง</option>
          @foreach($gachapon as $all_gachapon)
            <option value="{{$all_gachapon->gachapon_id}}">{{$all_gachapon->gachapon_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>สินค้า</label>
        <select class="form-control" name="product_id">
            <option value="">กรุณาเลือกสินค้า</option>
          @foreach($product as $all_product)
            <option value="{{$all_product->product_id}}">{{$all_product->product_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>จำนวน</label>
        <input class="form-control" type="number" name="role_qty" value="" placeholder="จำนวนสินค้า">
      </div>
      <div class="form-group">
        <label>แรร์</label>
        <input type="checkbox" name="role_rare" value="1">
      </div>
      @csrf
      <button class="btn btn-success form-control" type="submit" name="button">สร้างสินค้าในกาชาปอง</button>
    </form>
  </div>
</div>
@endsection
