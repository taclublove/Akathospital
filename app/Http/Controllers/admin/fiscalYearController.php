<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
use App\Models\FiscalYear;

class fiscalYearController extends Controller
{
    // set index page view
	public function index() {
		return view('admin.fiscalYear.fcy');
	}

	// handle fetch all fiscal year ajax request
	public function fiscalYearFetchAll() {
		$fiscalYears = FiscalYear::all();
		$output = '';
		if ($fiscalYears->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ปีงบประมาณ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($fiscalYears as $fiscalYear) {
				$output .= '<tr>
                <td>' . $fiscalYear->id . '</td>
                <td>' . $fiscalYear->fiscalYear_name . '</td>
                <td>
                  <a href="#" id="' . $fiscalYear->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#FiscalYearModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $fiscalYear->id . '"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new fiscal year ajax request
	public function fiscalYearStore(Request $request) {

        $validatorFiscalYear = Validator::make($request->all(), [
            'fiscalYear_name' => ['required', 'string', 'max:4'],
        ]);

        if($validatorFiscalYear->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'ไม่สามารถเพิ่มข้อมูลได้มากกว่า 4 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $validatorFiscalYear2 = Validator::make($request->all(), [
                'fiscalYear_name' => ['required', 'string', 'max:4', 'regex:/^[0-9]{1,}$/'],
            ]);

            if($validatorFiscalYear2->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'ต้องกรอกเฉพาะตัวเลขเท่านั้น',
                    'icon' => 'error'
                ]);
            } else {
                $fiscalYearData = [
                    'fiscalYear_name' => $request->fiscalYear_name
                ];

                FiscalYear::create($fiscalYearData);
                return response()->json([
                    'status' => 200,
                    'title' => 'Added!',
                    'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                    'icon' => 'success'
                ]);
            }
        }
    }

	// handle edit an fiscal year ajax request
	public function fiscalYearEdit(Request $request) {
		$id = $request->id;
		$FiscalYear = FiscalYear::find($id);
		return response()->json($FiscalYear);
	}

	// handle update an fiscal year ajax request
	public function fiscalYearUpdate(Request $request) {
		$fileName = '';
		$fiscalYear = FiscalYear::find($request->fiscalYear_id);

        $validatorFiscalYearName = Validator::make($request->all(), [
            'fiscalYear_name' =>['required', 'max:4']
        ]);

        if($validatorFiscalYearName->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'Update ข้อมูลได้ไม่เกิน 4 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {

            $validatorFiscalYearName2 = Validator::make($request->all(), [
                'fiscalYear_name' =>['required', 'max:4', 'regex:/^[0-9]{1,}$/']
            ]);

            if($validatorFiscalYearName2->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'ข้อมูลจะต้องเป็นตัวเลขเท่านั้น',
                    'icon' => 'error'
                ]);
            } else {
                $fiscalYearData = [
                    'fiscalYear_name' => $request->fiscalYear_name
                ];

                if($fiscalYearData) {
                    $fiscalYear->update($fiscalYearData);
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
        }
	}

	// handle delete an fiscal year ajax request
	public function fiscalYearDelete(Request $request) {
		$id = $request->id;
        $fiscalYear = FiscalYear::find($id);

        if($fiscalYear) {
            $fiscalYear->delete($id);
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
