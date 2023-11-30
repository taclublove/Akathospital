<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MainMenuShow;
use App\Models\SubMenuShow;

class subMenuShowController extends Controller
{
    // set index page view
	public function index() {
        $mainMenuShow = MainMenuShow::all();
		return view('admin.subMenuShow.sms', compact('mainMenuShow'));
	}

	// handle fetch all sub menu show ajax request
	public function subMenuShowFetchAll() {
		$subMenuShow = SubMenuShow::all();
		$output = '';
		if ($subMenuShow->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อหัวข้อหลัก</th>
                <th>ชื่อหัวข้อย่อย</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($subMenuShow as $sms) {
				$output .= '<tr>
                <td>' . $sms->id . '</td>
                <td>' . $sms->mainMenuShow->main_menu_show_name . '</td>
                <td>' . $sms->sub_menu_show_name . '</td>
                <td>
                  <a href="#" id="' . $sms->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#SubMenuShowModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $sms->id . '"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new sub menu show ajax request
	public function subMenuShowStore(Request $request) {

        $validatorMainMenuShow = Validator::make($request->all(), [
            'main_menu_show_id' => ['required', 'string', 'exists:main_menu_shows,id'],
        ]);

        if($validatorMainMenuShow->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'ข้อมูล Table ไม่ตรงกัน',
                'icon' => 'error'
            ]);
        } else {
            $validatorSubMenuShowName = Validator::make($request->all(), [
                'sub_menu_show_name' => ['required', 'string', 'max:50', ],
            ]);

            if($validatorSubMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'กรอกข้อมูลได้มากสุด 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $subMenuShowData = [
                    'main_menu_show_id' => $request->main_menu_show_id,
                    'sub_menu_show_name' => $request->sub_menu_show_name
                ];

                SubMenuShow::create($subMenuShowData);
                return response()->json([
                    'status' => 200,
                    'title' => 'Added!',
                    'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                    'icon' => 'success'
                ]);
            }
        }
    }

	// handle edit an sub menu show ajax request
	public function subMenuShowEdit(Request $request) {
		$id = $request->id;
		$subMenuShow = SubMenuShow::find($id);
		return response()->json($subMenuShow);
	}

	// handle update an sub menu show  ajax request
	public function subMenuShowUpdate(Request $request) {
		$subMenuShow = SubMenuShow::find($request->subMenuShow_id);

        $validatorMainMenuShow = Validator::make($request->all(), [
            'main_menu_show_id' => ['required', 'string', 'exists:main_menu_shows,id'],
        ]);

        if($validatorMainMenuShow->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'ข้อมูล Table ไม่ตรงกัน',
                'icon' => 'error'
            ]);
        } else {
            $validatorSubMenuShowName = Validator::make($request->all(), [
                'sub_menu_show_name' => ['required', 'string', 'max:50', ],
            ]);

            if($validatorSubMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'กรอกข้อมูลได้มากสุด 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $subMenuShowData = [
                    'main_menu_show_id' => $request->main_menu_show_id,
                    'sub_menu_show_name' => $request->sub_menu_show_name
                ];

                if($subMenuShowData) {
                    $subMenuShow->update($subMenuShowData);
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

	// handle delete an sub menu show ajax request
	public function subMenuShowDelete(Request $request) {
		$id = $request->id;
        $subMenuShow = SubMenuShow::find($id);

        if($subMenuShow) {
            $subMenuShow->delete($id);
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
