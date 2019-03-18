@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container">
  <div class="row mt-5">
    @if ($errors->any())
        <div class="col-md-12">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
    @endif
    @if(session('login_fail'))
      <div class="col-md-12">
        <div class="alert alert-danger">
          <ul>
            <li>{{session('login_fail')}}</li>
          </ul>
        </div>
      </div>
    @endif
    @if(session('transfer-fail'))
    <div class="col-md-12">
      <div class="alert alert-danger">
        <span>{{session('transfer-fail')}}</span>
      </div>
    </div>
    @endif
    <div class="col-md-6 login-box">
      <h3 class='text-center'>เข้าสู่ระบบ</h3>
      <form action="/login-process" method="post">
        <div class="form-group">
          <label for="login_email">อีเมลล์</label>
          <input id="login_email" class="form-control" type="email" name="login_email" value="" placeholder="กรุณาใส่อีเมลล์">
        </div>
        <div class="form-group">
          <label for="login_password">พาสเวิร์ด</label>
          <input id="login_password" class="form-control" type="password" name="login_password" value="" placeholder="กรุณาใส่พาสเวิร์ด">
        </div>
        @csrf
        <button class="btn btn-success form-control" type="submit">ล๊อกอิน</button>
      </form>
    </div>
    <div class="col-md-6 register-box">
      <h3 class="text-center">สมัครสมาชิก</h3>
      <form action="/register-process" method="post">
        <div class="form-group">
          <label for="register_fname">ชื่อจริง</label>
          <input id="register_fname" class="form-control" type="text" name="register_fname" value="" placeholder="กรุณาใส่ชื่อจริง">
        </div>
        <div class="form-group">
          <label for="register_fname">นามสกุล</label>
          <input id="register_lname" class="form-control" type="text" name="register_lname" value="" placeholder="กรุณาใสนามสกุล">
        </div>
        <div class="form-group">
          <label for="register_email">อีเมลล์</label>
          <input id="register_email" class="form-control" type="email" name="register_email" value="" placeholder="กรุณาใส่อีเมลล์">
        </div>
        <div class="form-group">
          <label for="register_password">พาสเวิร์ด</label>
          <input id="register_password" class="form-control" type="password" name="register_password" value="" placeholder="กรุณาใส่พาสเวิร์ด">
        </div>
        <div class="form-group">
          <label for="register_re_password">พาสเวิร์ด-อีกครั้ง</label>
          <input id="register_re_password" class="form-control" type="password" name="register_re_password" value="" placeholder="กรุณาใส่พาสเวิร์ด-อีกครั้ง">
        </div>
        <div class="form-group">
          <label for="register_birthdate">วันเกิด</label>
          <input id="register_birthdate" class="form-control" type="date" name="register_birthdate" value="">
        </div>
        <div class="form-group">
          <label for="register_tel">เบอร์โทร</label>
          <input id="register_tel" class="form-control" type="number" name="register_tel" value="" placeholder="กรุณาใส่เบอร์โทร">
        </div>
        <div class="form-group">
          <label for="register_gender_male">ชาย</label>
          <input id="register_gender_male" type="radio" name="register_gender" value="1">
          <label for="register_gender_female">หญิง</label>
          <input id="register_gender_female" type="radio" name="register_gender" value="2">
        </div>
        @csrf
        <button class="btn btn-success form-control" type="submit">สมัครสมาชิก</button>
      </form>
    </div>
  </div>
</div>
@endsection
