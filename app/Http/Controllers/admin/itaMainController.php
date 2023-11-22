<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
use App\Models\Ita_main;
use App\Models\FiscalYear;

class itaMainController extends Controller
{
    // set index page view
	public function index() {
        $fiscalYears = FiscalYear::all();
		return view('admin.ita_moit.ita_moit', compact('fiscalYears'));
	}

	// handle fetch all ita main ajax request
	public function itaMainFetchAll() {
		$itaMains = Ita_main::all();
		$output = '';
		if ($itaMains->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อหัวข้อหลัก</th>
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

	// handle insert a new ita main ajax request
	public function itaMainStore(Request $request) {

        $validatorNameItaMain = Validator::make($request->all(), [
            'name_ita_main' => ['required', 'string', 'max:300']
        ]);

        if($validatorNameItaMain->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'กรอกข้อมูลได้ไม่เกิน 300 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $validatorfiscalYearID = Validator::make($request->all(), [
                'fiscalYear_id' => ['required', 'string', 'max:4', 'exists:fiscal_years,id'],
            ]);

            if($validatorfiscalYearID->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'กรอกข้อมูลได้ไม่เกิน 4 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {

                $validatordescriptionItaMain = Validator::make($request->all(), [
                    'description_ita_main' => ['required', 'string', 'max:255']
                ]);

                if($validatordescriptionItaMain->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'กรอกข้อมูลได้ไม่เกิน 300 ตัวอักษร',
                        'icon' => 'error'
                    ]);
                } else {
                    $itaMainData = [
                        'name_ita_main' => $request->name_ita_main,
                        'fiscalYear_id' => $request->fiscalYear_id,
                        'description_ita_main' => $request->description_ita_main
                    ];

                    Ita_main::create($itaMainData);
                    return response()->json([
                        'status' => 200,
                        'title' => 'Added!',
                        'message' => 'เพิ่มข้อมูลสำเร็จ',
                        'icon' => 'success'
                    ]);
                }
            }
        }
    }

	// handle edit an ita main ajax request
	public function itaMainEdit(Request $request) {
		$id = $request->id;
		$itaMain = Ita_main::find($id);
		return response()->json($itaMain);
	}

	// handle update an ita main ajax request
	public function itaMainUpdate(Request $request) {
		// $fileName = '';
		$itaMain = Ita_main::find($request->itaMain_id);
        $validatorNameItaMain = Validator::make($request->all(), [
            'name_ita_main' => ['required', 'string', 'max:300']
        ]);

        if($validatorNameItaMain->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'กรอกข้อมูลได้ไม่เกิน 300 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $validatorfiscalYearID = Validator::make($request->all(), [
                'fiscalYear_id' => ['required', 'string', 'max:4', 'exists:fiscal_years,id'],
            ]);

            if($validatorfiscalYearID->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'กรอกข้อมูลได้ไม่เกิน 4 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {

                $validatordescriptionItaMain = Validator::make($request->all(), [
                    'description_ita_main' => ['required', 'string', 'max:255']
                ]);

                if($validatordescriptionItaMain->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'กรอกข้อมูลได้ไม่เกิน 300 ตัวอักษร',
                        'icon' => 'error'
                    ]);
                } else {
                    $itaMainData = [
                        'name_ita_main' => $request->name_ita_main,
                        'fiscalYear_id' => $request->fiscalYear_id,
                        'description_ita_main' => $request->description_ita_main
                    ];
                }
            }
        }
        if($itaMainData) {
            $itaMain->update($itaMainData);
            return response()->json([
                'status' => 200,
                'title' => 'Added!',
                'message' => 'Update ข้อมูลเสร็จสิ้น',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'Update ข้อมูลไม่สำเร็จ',
                'icon' => 'error'
            ]);
        }
	}

	// handle delete an ita main ajax request
	public function itaMainDelete(Request $request) {
		$id = $request->id;
        $itaMain = Ita_main::find($id);

        if($itaMain) {
            $itaMain->delete($id);
            return response()->json([
                'status' => 200,
                'title' => 'Deleted!',
                'message' => 'ลบข้อมูลเสร็จสิ้น',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'ไม่สามารถลบข้อมูลได้',
                'icon' => 'error'
            ]);
        }
	}
}
