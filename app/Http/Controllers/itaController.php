<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Ita_main;
use App\Models\Ita_sub_1;
use App\Models\Ita_sub_2;
use App\Models\Ita_sub_3;
use App\Models\Ita_sub_4;

class itaController extends Controller
{
    public function index($id) {
        $year = $id;
        $itaMains = Ita_main::OrderBy('id', 'asc')->get();
        $itaSub1 = Ita_sub_1::OrderBy('id', 'asc')->get();
        $itaSub2 = Ita_sub_2::OrderBy('id', 'asc')->get();
        $itaSub3 = Ita_sub_3::OrderBy('id', 'asc')->get();
        $itaSub4 = Ita_sub_4::OrderBy('id', 'asc')->get();
        return view('index_template.ita.ita', compact('itaMains', 'year', 'itaSub1', 'itaSub2', 'itaSub3', 'itaSub4'));
    }
}
