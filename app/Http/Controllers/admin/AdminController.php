<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $user = User::all();
        return view('dashboardAdmin', compact('user'));
    }
}
