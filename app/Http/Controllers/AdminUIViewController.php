<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUIViewController extends Controller
{
    public function ShowAdminDashboard()  {
      return view('admin.pages.dashboard');
    }
}
