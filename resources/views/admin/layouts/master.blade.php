<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin-assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/admin-assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin-assets/css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/admin-assets/js/adminlte.min.js" type="text/javascript"></script>
  </head>
  <body class="skin-blue">
     <!-- Main Header -->
     <header class="main-header">
        <!-- Logo -->
        <a href="/admin" class="logo">
           <!-- mini logo for sidebar mini 50x50 pixels -->
           <span class="logo-mini"><b>G</b>CH</span>
           <!-- logo for regular state and mobile devices -->
           <span class="logo-lg">Gachame</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
           <!-- Sidebar toggle button-->
           <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
           <span class="sr-only">Toggle navigation</span>
           </a>
           <!-- Navbar Right Menu -->
           <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                 <!-- User Account Menu -->
                 <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <!-- The user image in the navbar-->
                       <i class="fas fa-user"></i>
                       <!-- hidden-xs hides the username on small devices so only the image appears. -->
                       <span class="hidden-xs">{{session('user_email')}}</span>
                    </a>
                    <ul class="dropdown-menu">
                       <!-- The user image in the menu -->
                       <li class="user-body">
                          <a href="/logout-process">Log out</a>
                       </li>
                    </ul>
                 </li>
                 <!-- Control Sidebar Toggle Button -->
                 <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                 </li>
              </ul>
           </div>
        </nav>
     </header>
     <!-- Left side column. contains the logo and sidebar -->
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <!-- search form (Optional) -->
           <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                 <input type="text" name="q" class="form-control" placeholder="Search...">
                 <span class="input-group-btn">
                 <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                 </button>
                 </span>
              </div>
           </form>
           <!-- /.search form -->
           <!-- Sidebar Menu -->
           <ul class="sidebar-menu" data-widget="tree">
              <li class="header">เมนูหลัก</li>
              <!-- Optionally, you can add icons to the links -->
              <li class="treeview">
                 <a href="#"><i class="fas fa-dollar-sign"></i>  <span>แลกเงิน</span>
                 <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
                 </span>
                 </a>
                 <ul class="treeview-menu">
                    <li><a href="/admin/money"><i class="fas fa-money-bill-alt"></i>  เติมเงิน</a></li>
                    <li><a href="/admin/token"><i class="fas fa-coins"></i>  เติม Token</a></li>
                 </ul>
                 <li><a href="/admin/transfer"><i class="fas fa-exchange-alt"></i> สลิปรอตรวจสอบ</a> </li>
                 <li><a href="/admin/transfer-all"><i class="fas fa-clipboard-check"></i> การโอนเงินทั้งหมด</a> </li>
                 <li><a href="/admin/product"><i class="fas fa-box-open"></i> สินค้า</a> </li>
                 <li><a href="/admin/gachapon"><i class="fas fa-random"></i> กาชาปอง</a> </li>
           </ul>
           <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
     </aside>
     <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content">
           @yield('content')
        </section>
     </div>
  </body>
  </body>
</html>
