<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Ita_main;
use App\Models\Ita_sub_1;

class itaSub1Controller extends Controller
{
    // set index page view
	public function index() {
        $itaMains = Ita_main::all();
		return view('admin.ita_sub_1.is1', compact('itaMains'));
	}

	// handle fetch all ita sub 1 ajax request
	public function itaSub1FetchAll() {
		$itaSub1 = Ita_sub_1::all();
        $mode = 'itaSub1';
		$output = '';
		if ($itaSub1->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ItaMain</th>
                <th>ปีงบประมาณ</th>
                <th>ItaSubName</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($itaSub1 as $itaSub) {
				$output .= '<tr>
                <td>' . $itaSub->id . '</td>
                <td>' . $itaSub->itaMain->name_ita_main . '</td>
                <td>' . $itaSub->itaMain->fiscalYear->fiscalYear_name . '</td>
                <td>' . $itaSub->ita_sub_name . '</td>
                <td><a href="' . route("showPDF", ["id" => $itaSub->id, "mode" => $mode]) . '">' . $itaSub->file . '</a></td>
                <td>
                  <a href="#" id="' . $itaSub->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#ItaSub1Modal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $itaSub->id . '"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new ita sub ajax request
	public function itaSub1Store(Request $request) {
        $file = $request->file('file');
        if($file) {
            $fileExtension = $file->getClientOriginalExtension();

            $allowedExtensions = ['pdf'];

            if(in_array(strtolower($fileExtension), $allowedExtensions)) {
                $fileName = time() . '.' . $fileExtension;
                $file->storeAs('public/files/ita/66/itaSub1', $fileName);

                $validatorItaMainID = Validator::make($request->all(),[
                    'itaMain_id' => ['required', 'string', 'max:4', 'exists:ita_mains,id']
                ]);

                if($validatorItaMainID->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                        'icon' => 'error'
                    ]);
                } else {
                    $validatorItaSubName = Validator::make($request->all(),[
                        'ita_sub_name' => ['required', 'string', 'max:200']
                    ]);

                    if($validatorItaSubName->fails()) {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'สามารถกรอกข้อมูลได้แค่ 200 ตัวอักษร',
                            'icon' => 'error'
                        ]);
                    } else {
                        $itaSub1Data = [
                            'itaMain_id' => $request->itaMain_id,
                            'ita_sub_name' => $request->ita_sub_name,
                            'file' => $fileName
                        ];

                        Ita_sub_1::create($itaSub1Data);
                        return response()->json([
                            'status' => 200,
                            'title' => 'Added!',
                            'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                            'icon' => 'success'
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'ไฟล์ของคุณนามสกุลไม่ถูกต้องกรุณาใช้นามสกุล : .pdf',
                    'icon' => 'error'
                ]);
            }
        } else {
            $fileName = '';
        }

        $itaSub1Data = [
            'itaMain_id' => $request->itaMain_id,
            'ita_sub_name' => $request->ita_sub_name,
            'file' => $fileName
        ];

        Ita_sub_1::create($itaSub1Data);
        return response()->json([
            'status' => 200,
            'title' => 'Added!',
            'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
            'icon' => 'success'
        ]);
    }

	// handle edit an ita sub 1 ajax request
	public function itaSub1Edit(Request $request) {
		$id = $request->id;
		$itaSub1 = Ita_sub_1::find($id);
		return response()->json($itaSub1);
	}

	// handle update an ita sub 1 ajax request
	public function itaSub1Update(Request $request) {
		$fileName = '';
		$itaSub1 = Ita_sub_1::find($request->itaSub1_id);
		if ($request->hasFile('file')) {
            $file = $request->file('file');
            if($file) {
                $fileExtensions = $file->getClientOriginalExtension();
                $allowedExtensions = ['pdf'];
                if(in_array(strtolower($fileExtensions), $allowedExtensions)) {
                    $fileName = time() . '.' . $fileExtensions;
                    $file->storeAs('public/files/ita/66/itaSub1', $fileName);

                    $validatorItaMainID = Validator::make($request->all(),[
                        'itaMain_id' => ['required', 'string', 'max:4', 'exists:ita_mains,id']
                    ]);

                    if($validatorItaMainID->fails()) {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                            'icon' => 'error'
                        ]);
                    } else {
                        $validatorItaSubName = Validator::make($request->all(),[
                            'ita_sub_name' => ['required', 'string', 'max:200']
                        ]);

                        if($validatorItaSubName->fails()) {
                            return response()->json([
                                'status' => 400,
                                'title' => 'Error!',
                                'message' => 'สามารถกรอกข้อมูลได้แค่ 200 ตัวอักษร',
                                'icon' => 'error'
                            ]);
                        } else {
                            if($itaSub1) {
                                Storage::delete('public/files/ita/66/itaSub1/' . $itaSub1->file);
                            } else {
                                return response()->json([
                                    'status' => 400,
                                    'title' => 'Error!',
                                    'message' => 'ลบรูปเก่าไม่สำเร็จ',
                                    'icon' => 'error'
                                ]);
                            }
                        }
                    }
                } else {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'นามสกุลไฟล์ของคุณไม่ถูกต้องกรุณาใช้สกุลไฟล์ : .pdf',
                        'icon' => 'error'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'ไม่มีไฟล์ที่ส่งเข้ามา',
                    'icon' => 'error'
                ]);
            }
		} else{
            if($fileName == '') {
                if($request->hasFile('file')) {
                    $file = $request->file('file');
                    if($file) {
                        $fileExtensions = $file->getClientOriginalExtension();
                        $allowedExtensions = ['pdf'];
                        if(in_array(strtolower($fileExtensions), $allowedExtensions)) {
                            $fileName = time() . '.' . $fileExtensions;
                            $file->storeAs('public/files/ita/66/itaSub1', $fileName);

                            $validatorItaMainID = Validator::make($request->all(),[
                                'itaMain_id' => ['required', 'string', 'max:4', 'exists:ita_mains,id']
                            ]);

                            if($validatorItaMainID->fails()) {
                                return response()->json([
                                    'status' => 400,
                                    'title' => 'Error!',
                                    'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                                    'icon' => 'error'
                                ]);
                            } else {
                                $validatorItaSubName = Validator::make($request->all(),[
                                    'ita_sub_name' => ['required', 'string', 'max:200']
                                ]);

                                if($validatorItaSubName->fails()) {
                                    return response()->json([
                                        'status' => 400,
                                        'title' => 'Error!',
                                        'message' => 'สามารถกรอกข้อมูลได้แค่ 200 ตัวอักษร',
                                        'icon' => 'error'
                                    ]);
                                } else {

                                }
                            }
                        } else {
                            return response()->json([
                                'status' => 400,
                                'title' => 'Error!',
                                'message' => 'นามสกุลไฟล์ของคุณไม่ถูกต้องกรุณาใช้สกุลไฟล์ : .pdf',
                                'icon' => 'error'
                            ]);
                        }
                    }
                } else {
                    $fileName = '';
                }
            } else {
                $fileName = $request->itaSub1_file;
            }
		}
        $itaSub1Data = [
            'itaMain_id' => $request->itaMain_id,
            'ita_sub_name' => $request->ita_sub_name,
            'file' => $fileName
        ];
        if($itaSub1Data) {
            $itaSub1->update($itaSub1Data);
            return response()->json([
                'status' => 200,
                'title' => 'Added!',
                'message' => 'Update ข้อมูลเสร็จสิ้น',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 300,
                'title' => 'Error!',
                'message' => 'Update ข้อมูลไม่สำเร็จ',
                'icon' => 'error'
            ]);
        }
	}

	// handle delete an ita sub 1 ajax request
	public function itaSub1Delete(Request $request) {
		$id = $request->id;
        $itaSub1 = Ita_sub_1::find($id);
        if(Storage::delete('public/files/ita/66/itaSub1/' . $itaSub1->file)) {
            Ita_sub_1::destroy($id);
            return response()->json([
                'status' => 200,
                'title' => 'Deleted!',
                'message' => 'ลบข้อมูล และ File เสร็จสิ้น',
                'icon' => 'success'
            ]);
        } else {
            Ita_sub_1::destroy($id);
            return response()->json([
                'status' => 200,
                'title' => 'Error!',
                'message' => 'ลบข้อมูลที่ไม่มี File เสร็จสิ้น',
                'icon' => 'error'
            ]);
        }
	}
}
