<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class pressReleaseController extends Controller
{
    public function index() {
        return view('index_template.press_release.press_release');
    }
}
