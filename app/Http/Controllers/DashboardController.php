<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index () {
    	return view ('backend.dashboard.dashboard');
    }

    public function logout () {
    	Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
