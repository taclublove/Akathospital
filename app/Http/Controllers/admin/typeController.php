<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class typeController extends Controller
{
    public function index() {
        return view('admin.type.t');
    }

    public function typeFetchAll() {
        $types = Type::all();
        $output = '';
        if ($types->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>สถานะ</th>
                <th>วันที่เพิ่มข้อมูล</th>
                <th>วันที่ UPDATE ข้อมูล</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($types as $type) {
                $output .= '<tr>
                <td>' . $type->id . '</td>
                <td>' . $type->type_name . '</td>
                <td>' . $type->created_at . '</td>
                <td>' . $type->updated_at . '</td>
                <td>
                  <a href="#" id="' . $type->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editTypeModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $type->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }
 
    // insert a new Type ajax request
    public function typeStore(Request $request) {
        $typeData = ['type_name' => $request->type_name];
        Type::create($typeData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // edit an employee ajax request
    public function Edit(Request $request) {
        $id = $request->id;
        $type = Type::find($id);
        return response()->json($type);
    }
 
    // update an Sex ajax request
    public function typeUpdate(Request $request) {
        $fileName = '';
        $type = Type::find($request->type_id);
        // if ($request->hasFile('avatar')) {
        //     $file = $request->file('avatar');
        //     $fileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/images/', $fileName);
        //     if ($sex->avatar) {
        //         Storage::delete('public/images/' . $sex->avatar);
        //     }
        // } else {
        //     $fileName = $request->sex_avatar;
        // }
 
        $typeData = ['type_name' => $request->type_name];
 
        $type->update($typeData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // delete an Sex ajax request
    public function typeDelete(Request $request) {
        $id = $request->id;
        $type = Type::find($id);
        $type->delete();
    }
}
