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
    <form action="/admin/token/{{$token->token_id}}/edit" method="post">
      <div class="form-group">
        <label>ชื่อการแลกเปลี่ยน</label>
        <input class="form-control" type="text" name="token_name" placeholder="กรุณากรอกชื่อการแลกเปลี่ยน" value="{{$token->token_name}}">
      </div>
      <div class="form-group">
        <label>จำนวนเงินที่แลก</label>
        <input class="form-control" type="number" name="token_pay" placeholder="กรุณากรอกจำนวนเงินที่แลก" value="{{$token->token_pay}}">
      </div>
      <div class="form-group">
        <label>จำนวน token ที่ได้</label>
        <input class="form-control" type="number" name="token_get" placeholder="กรุณากรอกจำนวน token ที่ได้" value="{{$token->token_get}}">
      </div>
      @csrf
      <button class="btn btn-warning form-control" type="submit" name="button">แก้ไขการแลก token</button>
    </form>
  </div>
</div>
@endsection
