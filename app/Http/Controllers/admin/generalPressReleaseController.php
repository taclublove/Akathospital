<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class generalPressReleaseController extends Controller
{
    public function index() {
        return view('admin.generalPressRelease.gprl');
    }

    public function gprlCreate() {
        return view('admin.generalPressRelease.create');
    }

}
