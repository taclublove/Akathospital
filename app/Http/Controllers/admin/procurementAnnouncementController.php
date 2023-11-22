<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\precurementAnnouncement;

class procurementAnnouncementController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.procurementAnnouncement.pa', compact('users'));
    }

}
