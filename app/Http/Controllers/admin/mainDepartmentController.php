<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainDepartment;
use Illuminate\Support\Facades\Validator;

class mainDepartmentController extends Controller
{
    public function index() {
        return view('admin.prefix.pf');
    }

    // FatchAll Start
    public function mainDepartmentFetchAll() {
        $mainDepartments = MainDepartment::all();
        $output = '';
        if ($mainDepartments->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อแผนก</th>
                <th>วันที่เพิ่มข้อมูล</th>
                <th>วันที่ UPDATE ข้อมูล</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($mainDepartments as $mainDepartment) {
                $output .= '<tr>
                <td>' . $mainDepartment->id . '</td>
                <td>' . $mainDepartment->name . '</td>
                <td>' . $mainDepartment->created_at . '</td>
                <td>' . $mainDepartment->updated_at . '</td>
                <td>
                  <a href="#" id="' . $mainDepartment->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPrefixModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $mainDepartment->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }
    // FatchAll End

    // insert a new ajax request Start
    public function mainDepartmentStore(Request $request) {
        $validatorName = Validator::make($requets->all(), [
            'name' => ['required', 'string', 'max:100']
        ]);

        if($validatorName->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'สามารถกรอกข้อมูลได้แค่ 100 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $mainDepartmentData = [
                'name' => $request->name
            ];
            MainDepartment::create($mainDepartmentData);
            return response()->json([
                'status' => 200,
                'title' => 'Added!',
                'message' => 'บันทึกข้อมูลเสร็จสิ้น',
                'icon' => 'success'
            ]);
        }
    }
    // insert a new ajax request End

    // edit an ajax request Start
    public function mainDepartmentEdit(Request $request) {
        $id = $request->id;
        $mainDepartment = MainDepartment::find($id);
        return response()->json($mainDepartment);
    }

    // update an ajax request
    public function mainDepartmentUpdate(Request $request) {
        $fileName = '';
        $mainDepartments = MainDepartment::find($request->prefix_id);

        $validatorName = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100']
        ]);

        if($validatorName->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'สามารถกรอกข้อมูลได้แค่ 100 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $mainDepartmentData = [
                'name' => $request->name
            ];

            $mainDepartments->update($mainDepartmentData);
            return response()->json([
                'status' => 200,
                'title' => 'Added!',
                'message' => 'แก้ไขข้อมูลเสร็จสิ้น',
                'icon' => 'success'
            ]);
        }
    }
    // edit an ajax request End

    // delete an ajax request Start
    public function mainDepartmentDelete(Request $request) {
        $id = $request->id;
        $mainDepartment = MainDepartment::find($id);
        $mainDepartment->delete();
    }
    // delete an ajax request End
}
