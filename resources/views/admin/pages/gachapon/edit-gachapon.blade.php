@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>แก้ไขกาชาปอง</h3>
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
    <form action="/admin/gachapon/{{$gachapon->gachapon_id}}/edit" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>ชื่อกาชาปอง</label>
        <input class="form-control" type="text" name="gachapon_name" value="{{$gachapon->gachapon_name}}" placeholder="กรุณากรอกชื่อกาชาปอง">
      </div>
      <div class="form-group">
        <label>ราคาสุ่ม</label>
        <input class="form-control" type="number" name="gachapon_price" value="{{$gachapon->gachapon_price}}" placeholder="กรุณากรอกราคาสุ่ม">
      </div>
      <div class="form-group">
        <label>รูป</label>
        <br>
        <input type="file" name="gachapon_img" value="">
      </div>
      @csrf
      <button class="btn btn-warning form-control" type="submit" name="button">แก้ไขกาชาปอง</button>
    </form>
  </div>
</div>
@endsection
