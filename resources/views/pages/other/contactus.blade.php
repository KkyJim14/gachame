@extends('layouts.master')

@section('title')

@endsection

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">เกี่ยวกับเรา</h3>
      <p class="mt-4">
        เว็บไซต์ Gachame เป็นเว็บไซต์สุ่มกาชาปอง โดยผู้เล่นสามารถแลก Token เพื่อนำมาหมุนกาชาปอง โดยในแต่ละตู้จะมีของรางวัลไม่เหมือนกัน ซึ่งผู้เล่นจะสุ่มได้รางวัล 100% และมีโอกาสสุ่มได้ของแรร์ที่มีมูลค่าสูงด้วยในแต่ละตู้ เว็บไซต์พัฒนาด้วย
        Laravel Framework และ ฐานข้อมูล MySQL มีความปลอดภัยสูง เรามุ่งมั่นที่จะพัฒนาโปรเจ็คนี้ให้ก้าวสู่ระดับ Unicorn โปรเจ็คนี้เป็นเพียงแค่จุดเริ่มต้นของเรา ทีม Fire Brain
      </p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-12">
      <h3>สมาชิกทีม Fire Brain</h3>
    </div>
  </div>
  <hr>
  <div class="row text-center">
    <div class="col-md-4 profile-box mb-3">
      <img class="profile-info" src="/assets/img/info/jimmy.jpg" alt="jimmy">
      <h5 class="mt-3">CEO</h5>
      <h5>นาย ปิยะกานตร์ นิมมากุลวิรัตน์</h5>
    </div>
    <div class="col-md-4 profile-box mb-3">
      <img class="profile-info" src="/assets/img/info/boss.jpg" alt="boss">
      <h5 class="mt-3">Co-Founder</h5>
      <h5>นาย ศิรสิทธิ์ เติมพรวิทิต</h5>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-6 mt-2">
      <h3>Partner</h3>
      <hr>
      <div class="col-md-6 mt-2">
        <img class="profile-info" src="/assets/img/info/jimmygameplay.png" alt="jimmygameplay">
      </div>
    </div>
    <div class="col-md-6 mt-2">
      <h3>ติดต่อ</h3>
      <hr>
      <p>ออฟฟิศ (เวลาทำการ: ทุกวัน 10.00-22.00 น.)</p>
      <p>ห้างเกตเวย์บางซื่อ ชั้น 5 เลขที่ 162 ถนนประชาราษฎร์ สาย 2 แขวงบางซื่อ เขตบางซื่อ กรุงเทพฯ 10800</p>
      <h5><i class="fab fa-line"></i> : @gachame</h5>
      <h5><i class="fab fa-facebook"></i> : Gachame</h5>
      <h5><i class="fas fa-envelope"></i> : gachame@gmail.com</h5>
    </div>
  </div>
</div>
@endsection
