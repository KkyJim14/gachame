@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สร้างการแลก token</h3>
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
    <form action="/admin/token" method="post">
      <div class="form-group">
        <label>ชื่อการแลกเปลี่ยน</label>
        <input class="form-control" type="text" name="token_name" value="" placeholder="กรุณากรอกชื่อการแลกเปลี่ยน">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่แลก</label>
        <input class="form-control" type="number" name="token_pay" value="" placeholder="กรุณากรอกจำนวนเงินที่แลก">
      </div>
      <div class="form-group">
        <label>จำนวน token ที่ได้</label>
        <input class="form-control" type="number" name="token_get" value="" placeholder="กรุณากรอกจำนวน token ที่ได้">
      </div>
      @csrf
      <button class="btn btn-success form-control" type="submit" name="button">สร้างการแลก token</button>
    </form>
  </div>
</div>
@endsection
