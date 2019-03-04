@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
<h3>แก้ไขการแลกเงิน</h3>
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
    <form action="/admin/money/{{$money->money_id}}/edit" method="post">
      <div class="form-group">
        <label>ชื่อการแลกเปลี่ยน</label>
        <input class="form-control" type="text" name="money_name" value="{{$money->money_name}}" placeholder="กรุณากรอกชื่อการแลกเปลี่ยน">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่เติม</label>
        <input class="form-control" type="number" name="money_pay" value="{{$money->money_pay}}" placeholder="กรุณากรอกจำนวนเงินที่เติม">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่ได้</label>
        <input class="form-control" type="number" name="money_get" value="{{$money->money_get}}" placeholder="กรุณากรอกจำนวนเงินที่ได้">
      </div>
      @csrf
      <button class="btn btn-warning form-control" type="submit" name="button">แก้ไขการแลกเปลี่ยน</button>
    </form>
  </div>
</div>
@endsection
