<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class generalPressReleaseController extends Controller
{
    public function index() {
        return view('admin.generalPressRelease.gprl');
    }

    public function gprlCreate() {
        $users = User::all();
        return view('admin.generalPressRelease.create', compact('users'));
    }

    public function gprlFetchAll() {
        $itaMains = Ita_main::all();
		$output = '';
		if ($itaMains->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อผู้บันทึก</th>
                <th>ปีงบประมาณ</th>
                <th>คำอธิบาย</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($itaMains as $itaMain) {
				$output .= '<tr>
                <td>' . $itaMain->id . '</td>
                <td>' . $itaMain->name_ita_main . '</td>
                <td>' . $itaMain->fiscalYear->fiscalYear_name . '</td>
                <td>' . $itaMain->description_ita_main . '</td>
                <td>
                  <a href="#" id="' . $itaMain->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#ItaMainModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $itaMain->id . '"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
    }

    public function gprlStore(request $request) {
        if(isset($request)) {
            // return response()->json([
            //     'title' => 'มีการส่งข้อมูลมา'
            // ]);

            // return "มีการส่งข้อมูลมา";
            session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');

            // Redirect to 'gprl' route
            return redirect('gprl');
        } else {
            // return "มีการส่งข้อมูลมา";
            session()->flash('status', 'บันทึกข้อมูลไม่สำเร็จ');

            // Redirect to 'gprl' route
            return redirect('gprlStore');
        }
    }

}
