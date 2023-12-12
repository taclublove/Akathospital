<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\SubMenuShow;
use App\Models\GeneralPressRelease;

class pressReleaseController extends Controller
{
    public function index() {
        $subMenuShow = SubMenuShow::all();
        $gprls = GeneralPressRelease::all();
        return view('index_template.pressRelease.prl', compact('subMenuShow','gprls'));
    }
}
