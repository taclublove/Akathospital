<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sex;
use Illuminate\Http\Request;

class sexController extends Controller
{
    public function index() {
        return view('admin.sex.s');
    }

    public function sexFetchAll() {
        $sx = Sex::orderBy('id', 'asc')->get();
        $output = '';
        if ($sx->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>เพศ</th>
                <th>วันที่เพิ่มข้อมูล</th>
                <th>วันที่ UPDATE ข้อมูล</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($sx as $s) {
                $output .= '<tr>
                <td>' . $s->id . '</td>
                <td>' . $s->sex_name . '</td>
                <td>' . $s->created_at . '</td>
                <td>' . $s->updated_at . '</td>
                <td>
                  <a href="#" id="' . $s->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editSexModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $s->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }
 
    // insert a new employee ajax request
    public function sexStore(Request $request) {
        $sexData = ['sex_name' => $request->sex_name];
        Sex::create($sexData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // edit an employee ajax request
    public function sexEdit(Request $request) {
        $id = $request->id;
        $sex = Sex::find($id);
        return response()->json($sex);
    }
 
    // update an Sex ajax request
    public function sexUpdate(Request $request) {
        $fileName = '';
        $sex = Sex::find($request->sex_id);
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
 
        $sexData = ['sex_name' => $request->sex_name];
 
        $sex->update($sexData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // delete an Sex ajax request
    public function sexDelete(Request $request) {
        $id = $request->id;
        $sex = Sex::find($id);
        $sex->delete();
    }
}
