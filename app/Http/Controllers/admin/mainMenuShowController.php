<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainMenuShow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class mainMenuShowController extends Controller
{
    public function index() {
        return view('admin.mainMenuShow.mms');
    }

    public function mainMenuShowFetchAll() {
        $mainMenuShow = MainMenuShow::orderBy('id', 'asc')->get();
        $output = '';
        if ($mainMenuShow->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อ Menu หลัก</th>
                <th>Link</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($mainMenuShow as $mms) {
                $output .= '<tr>
                <td>' . $mms->id . '</td>
                <td>' . $mms->main_menu_show_name . '</td>
                <td>' . $mms->link . '</td>
                <td>
                  <a href="#" id="' . $mms->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#MainMenuShowModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $mms->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }

    // insert a new main menu show ajax request
    public function mainMenuShowStore(Request $request) {

        if($request->link) {
            $validatorMainMenuShowName = Validator::make($request->all(),[
                'main_menu_show_name' => ['required', 'string', 'max:50']
            ]);

            if($validatorMainMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'สามารถกรอกข้อมูลได้ไม่เกิน 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $validatorLink = Validator::make($request->all(), [
                    'link' => ['string']
                ]);

                if($validatorLink->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'กรุณาป้อน link มาใหม่',
                        'icon' => 'error'
                    ]);
                } else {
                    $mainMenuShowData = [
                        'main_menu_show_name' => $request->main_menu_show_name,
                        'link' => $request->link
                    ];
                    MainMenuShow::create($mainMenuShowData);
                    return response()->json([
                        'status' => 200,
                        'title' => 'Added!',
                        'message' => 'บันทึกข้อมูลเรียบร้อย',
                        'icon' => 'success'
                    ]);
                }
            }
        } else {
            $validatorMainMenuShowName = Validator::make($request->all(),[
                'main_menu_show_name' => ['required', 'string', 'max:50']
            ]);

            if($validatorMainMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'สามารถกรอกข้อมูลได้ไม่เกิน 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $mainMenuShowData = [
                    'main_menu_show_name' => $request->main_menu_show_name,
                    'link' => ''
                ];
                MainMenuShow::create($mainMenuShowData);
                return response()->json([
                    'status' => 200,
                    'title' => 'Added!',
                    'message' => 'บันทึกข้อมูลเรียบร้อย',
                    'icon' => 'success'
                ]);
            }
        }
    }

    // edit an main menu show ajax request
    public function mainMenuShowEdit(Request $request) {
        $id = $request->id;
        $mainMenuShow = MainMenuShow::find($id);
        return response()->json($mainMenuShow);
    }

    // update an main menu show ajax request
    public function mainMenuShowUpdate(Request $request) {
        // $fileName = '';
        $mainMenuShow = MainMenuShow::find($request->main_menu_show_id);

        if($request->link) {
            $validatorMainMenuShowName = Validator::make($request->all(),[
                'main_menu_show_name' => ['required', 'string', 'max:50']
            ]);

            if($validatorMainMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'สามารถกรอกข้อมูลได้ไม่เกิน 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $validatorLink = Validator::make($request->all(), [
                    'link' => ['string']
                ]);

                if($validatorLink->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'กรุณาป้อน link มาใหม่',
                        'icon' => 'error'
                    ]);
                } else {
                    $mainMenuShowData = [
                        'main_menu_show_name' => $request->main_menu_show_name,
                        'link' => $request->link
                    ];
                    $mainMenuShow->update($mainMenuShowData);
                    return response()->json([
                        'status' => 200,
                        'title' => 'Added!',
                        'message' => 'บันทึกข้อมูลเรียบร้อย',
                        'icon' => 'success'
                    ]);
                }
            }
        } else {
            $validatorMainMenuShowName = Validator::make($request->all(),[
                'main_menu_show_name' => ['required', 'string', 'max:50']
            ]);

            if($validatorMainMenuShowName->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'สามารถกรอกข้อมูลได้ไม่เกิน 50 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $mainMenuShowData = [
                    'main_menu_show_name' => $request->main_menu_show_name,
                    'link' => ''
                ];
                $mainMenuShow->update($mainMenuShowData);
                return response()->json([
                    'status' => 200,
                    'title' => 'Added!',
                    'message' => 'บันทึกข้อมูลเรียบร้อย',
                    'icon' => 'success'
                ]);
            }
        }
    }

    // delete an main menu show ajax request
    public function mainMenuShowDelete(Request $request) {
        $id = $request->id;
        $mainMenuShow = MainMenuShow::find($id);
        // $mainMenuShow->delete();
        if($mainMenuShow->delete()) {
            return response()->json([
                'status' => 200,
                'title' => 'Added!',
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
