<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function index(){
        $title='Dashboard';
        return view('superadmin.index', compact('title'));
    }
}
