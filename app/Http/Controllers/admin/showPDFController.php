<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Ita_sub_1;
use App\Models\Ita_sub_2;
use App\Models\Ita_sub_3;
use App\Models\Ita_sub_4;

class showPDFController extends Controller
{
    public function show($id, $mode) {
        $id = $id;
        if($mode == 'itaSub1') {
            $itaSub1 = Ita_sub_1::find($id);
            return view('admin.showFilePDF.showPDF', compact('itaSub1'));
        } else if($mode == 'itaSub2') {
            $itaSub2 = Ita_sub_2::find($id);
            return view('admin.showFilePDF.showPDF', compact('itaSub2'));
        } else if($mode == 'itaSub3') {
            $itaSub3 = Ita_sub_3::find($id);
            return view('admin.showFilePDF.showPDF', compact('itaSub3'));
        } else if($mode == 'itaSub4') {
            $itaSub4 = Ita_sub_4::find($id);
            return view('admin.showFilePDF.showPDF', compact('itaSub4'));
        } else {

        }
    }
}
