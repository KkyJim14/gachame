@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>สร้างการแลกเงิน</h3>
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
    <form action="/admin/money" method="post">
      <div class="form-group">
        <label>ชื่อการแลกเปลี่ยน</label>
        <input class="form-control" type="text" name="money_name" value="" placeholder="กรุณากรอกชื่อการแลกเปลี่ยน">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่เติม</label>
        <input class="form-control" type="number" name="money_pay" value="" placeholder="กรุณากรอกจำนวนเงินที่เติม">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่ได้</label>
        <input class="form-control" type="number" name="money_get" value="" placeholder="กรุณากรอกจำนวนเงินที่ได้">
      </div>
      @csrf
      <button class="btn btn-success form-control" type="submit" name="button">สร้างการแลกเปลี่ยน</button>
    </form>
  </div>
</div>
@endsection
