<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prefix;

class prefixController extends Controller
{
    public function index() {
        return view('admin.prefix.pf');
    }

    public function prefixFetchAll() {
        $prefix = Prefix::all();
        $output = '';
        if ($prefix->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>คำนำหน้า</th>
                <th>วันที่เพิ่มข้อมูล</th>
                <th>วันที่ UPDATE ข้อมูล</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($prefix as $pf) {
                $output .= '<tr>
                <td>' . $pf->id . '</td>
                <td>' . $pf->prefix_name . '</td>
                <td>' . $pf->created_at . '</td>
                <td>' . $pf->updated_at . '</td>
                <td>
                  <a href="#" id="' . $pf->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPrefixModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $pf->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record in the database!</h1>';
        }
    }
 
    // insert a new Prefix ajax request
    public function prefixStore(Request $request) {
        $prefixData = ['prefix_name' => $request->prefix_name];
        Prefix::create($prefixData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // edit an Prefix ajax request
    public function prefixEdit(Request $request) {
        $id = $request->id;
        $prefix = Prefix::find($id);
        return response()->json($prefix);
    }
 
    // update an Prefix ajax request
    public function prefixUpdate(Request $request) {
        $fileName = '';
        $prefix = Prefix::find($request->prefix_id);
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
 
        $prefixData = ['prefix_name' => $request->prefix_name];
 
        $prefix->update($prefixData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    // delete an Prefix ajax request
    public function prefixDelete(Request $request) {
        $id = $request->id;
        $prefix = Prefix::find($id);
        $prefix->delete();
    }
}
