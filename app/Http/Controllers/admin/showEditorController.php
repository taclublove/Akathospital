<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralPressRelease;

class showEditorController extends Controller
{
    public function gprlShow($id) {
        $gprls = GeneralPressRelease::find($id);
        return view('admin.showFileEditor.showEditor', compact('gprls'));
    }
}
