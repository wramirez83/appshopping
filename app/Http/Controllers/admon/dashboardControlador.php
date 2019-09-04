<?php

namespace App\Http\Controllers\admon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class dashboardControlador extends Controller
{
    public function index()
    {
      return view('dashboard.dashboard');
    }
}
