<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Gachame</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      @if(session('user_log'))
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img id="navbar__profile__img" src="/assets/img/profile/{{session('user_img')}}" alt="user_img"> {{session('user_fname')}} {{session('user_lname')}}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/transfer-report/{{session('user_id')}}">แจ้งโอนเงิน</a>
              <a class="dropdown-item" href="/wallet/{{session('user_id')}}">กระเป๋าตังค์</a>
              <a class="dropdown-item" href="/logout-process">ลงชื่อออก</a>
            </div>
          </li>
      </ul>
      @else
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/member">เข้าสู่ระบบ | สมัครสมาชิก</a>
        </li>
      </ul>
      @endif
    </div>
  </div>
</nav>
