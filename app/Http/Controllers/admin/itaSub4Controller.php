<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Ita_sub_3;
use App\Models\Ita_sub_4;

class itaSub4Controller extends Controller
{
    // set index page view
	public function index() {
        $itaSub3 = Ita_sub_3::all();
		return view('admin.ita_sub_4.is4', compact('itaSub3'));
	}

	// handle fetch all ita sub 4 ajax request
	public function itaSub4FetchAll() {
		$itaSub4 = Ita_sub_4::all();
        $mode = 'itaSub4';
		$output = '';
		if ($itaSub4->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ItaSub3</th>
                <th>ปีงบประมาณ</th>
                <th>ItaSubName</th>
                <th>File</th>
                <th>Link</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($itaSub4 as $itaSub) {
				$output .= '<tr>
                <td>' . $itaSub->id . '</td>
                <td>' . $itaSub->itaSub3->itaSub2->itaSub2_name . '</td>
                <td>' . $itaSub->itaSub3->itaSub2->itaSub1->itaMain->fiscalYear->fiscalYear_name . '</td>
                <td>' . $itaSub->itaSub4_name . '</td>
                <td><a href="' . route("showPDF", ["id" => $itaSub->id, "mode" => $mode]) . '">' . $itaSub->file . '</a></td>
                <td>' . $itaSub->link . '</td>
                <td>
                  <a href="#" id="' . $itaSub->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#ItaSub4Modal"><i class="bi-pencil-square h4"></i></a>

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

	// handle insert a new ita sub 4 ajax request
	public function itaSub4Store(Request $request) {
        $validatorItaSub3ID = Validator::make($request->all(),[
            'itaSub3_id' => ['required', 'string', 'max:4', 'exists:ita_sub_3s,id']
        ]);

        if($validatorItaSub3ID->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                'icon' => 'error'
            ]);
        } else {
            $validatorItaSub4Name = Validator::make($request->all(),[
                'itaSub4_name' => ['required', 'string', 'max:200']
            ]);

            if($validatorItaSub4Name->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'สามารถกรอกข้อมูลได้แค่ 200 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $file = $request->file('file');
                if($file) {
                    $fileExtension = $file->getClientOriginalExtension();

                    $allowedExtensions = ['pdf'];

                    if(in_array(strtolower($fileExtension), $allowedExtensions)) {
                        $fileName = time() . '.' . $fileExtension;
                        $file->storeAs('public/files/ita/66/itaSub4', $fileName);
                        $itaSub4Data = [
                            'itaSub3_id' => $request->itaSub3_id,
                            'itaSub4_name' => $request->itaSub4_name,
                            'file' => $fileName,
                            'link' => ''
                        ];

                        Ita_sub_4::create($itaSub4Data);
                        return response()->json([
                            'status' => 200,
                            'title' => 'Added!',
                            'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                            'icon' => 'success'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'ไฟล์ของคุณนามสกุลไม่ถูกต้องกรุณาใช้นามสกุล : .pdf',
                            'icon' => 'error'
                        ]);
                    }
                } else if($request->link) {
                    $fileName = '';
                    $itaSub4Data = [
                        'itaSub3_id' => $request->itaSub3_id,
                        'itaSub4_name' => $request->itaSub4_name,
                        'file' => $fileName,
                        'link' => $request->link
                    ];

                    Ita_sub_4::create($itaSub4Data);
                    return response()->json([
                        'status' => 200,
                        'title' => 'Added!',
                        'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                        'icon' => 'success'
                    ]);
                } else {
                    $fileName = '';
                    $itaSub4Data = [
                        'itaSub3_id' => $request->itaSub3_id,
                        'itaSub4_name' => $request->itaSub4_name,
                        'file' => $fileName,
                        'link' => ''
                    ];

                    Ita_sub_4::create($itaSub4Data);
                    return response()->json([
                        'status' => 200,
                        'title' => 'Added!',
                        'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                        'icon' => 'success'
                    ]);
                }

                $itaSub4Data = [
                    'itaSub3_id' => $request->itaSub3_id,
                    'itaSub4_name' => $request->itaSub4_name,
                    'file' => $fileName,
                    'link' => ''
                ];

                Ita_sub_4::create($itaSub4Data);
                return response()->json([
                    'status' => 200,
                    'title' => 'Added!',
                    'message' => 'เพิ่มข้อมูลเสร็จสิ้น',
                    'icon' => 'success'
                ]);
            }
        }
    }

	// handle edit an ita sub 4 ajax request
	public function itaSub4Edit(Request $request) {
		$id = $request->id;
		$itaSub4 = Ita_sub_4::find($id);
		return response()->json($itaSub4);
	}

	// handle update an ita sub 4 ajax request
	public function itaSub4Update(Request $request) {
		$fileName = '';
		$itaSub4 = Ita_sub_4::find($request->itaSub4_id);
		if ($request->hasFile('file')) {
            $file = $request->file('file');
            if($file) {
                $fileExtensions = $file->getClientOriginalExtension();
                $allowedExtensions = ['pdf'];
                if(in_array(strtolower($fileExtensions), $allowedExtensions)) {
                    $fileName = time() . '.' . $fileExtensions;
                    $file->storeAs('public/files/ita/66/itaSub4', $fileName);

                    $validatorItaSub3ID = Validator::make($request->all(),[
                        'itaSub3_id' => ['required', 'string', 'max:4', 'exists:ita_sub_3s,id']
                    ]);

                    if($validatorItaSub3ID->fails()) {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                            'icon' => 'error'
                        ]);
                    } else {
                        $validatorItaSub4Name = Validator::make($request->all(),[
                            'itaSub4_name' => ['required', 'string', 'max:200']
                        ]);

                        if($validatorItaSub4Name->fails()) {
                            return response()->json([
                                'status' => 400,
                                'title' => 'Error!',
                                'message' => 'สามารถกรอกข้อมูลได้แค่ 200 ตัวอักษร',
                                'icon' => 'error'
                            ]);
                        } else {
                            if($itaSub4) {
                                Storage::delete('public/files/ita/66/itaSub4/' . $itaSub4->file);
                                $itaSub4Data = [
                                    'itaSub3_id' => $request->itaSub3_id,
                                    'itaSub4_name' => $request->itaSub4_name,
                                    'file' => $fileName,
                                    'link' => '',
                                ];
                                if($itaSub4Data) {
                                    $itaSub4->update($itaSub4Data);
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
                            } else {
                                return response()->json([
                                    'status' => 400,
                                    'title' => 'Error!',
                                    'message' => 'ลบไฟล์เก่าไม่สำเร็จ',
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
                            $file->storeAs('public/files/ita/66/itaSub4', $fileName);

                            $validatorItaSub3ID = Validator::make($request->all(),[
                                'itaSub3_id' => ['required', 'string', 'max:4', 'exists:ita_sub_3s,id']
                            ]);

                            if($validatorItaSub3ID->fails()) {
                                return response()->json([
                                    'status' => 400,
                                    'title' => 'Error!',
                                    'message' => 'สามารถกรอกข้อมูลได้แค่ 4 ตัวอักษร',
                                    'icon' => 'error'
                                ]);
                            } else {
                                $validatorItaSub4Name = Validator::make($request->all(),[
                                    'itaSub4_name' => ['required', 'string', 'max:200']
                                ]);

                                if($validatorItaSub4Name->fails()) {
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
                } else if($request->link) {
                    $fileName = '';

                    if($itaSub4) {
                        Storage::delete('public/files/ita/66/itaSub4/' . $itaSub4->file);
                    } else {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'ลบไฟล์เก่าไม่สำเร็จ',
                            'icon' => 'error'
                        ]);
                    }

                    $itaSub4Data = [
                        'itaSub3_id' => $request->itaSub3_id,
                        'itaSub4_name' => $request->itaSub4_name,
                        'file' => $fileName,
                        'link' => $request->link
                    ];

                    if($itaSub4Data) {
                        $itaSub4->update($itaSub4Data);
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
                } else {
                    $fileName = '';
                }
            } else {
                $fileName = $request->itaSub4_file;
            }
		}
        $fileName = $request->itaSub4_file;
        $itaSub4Data = [
            'itaSub3_id' => $request->itaSub3_id,
            'itaSub4_name' => $request->itaSub4_name,
            'file' => $fileName,
            'link' => ''
        ];
        if($itaSub4Data) {
            $itaSub4->update($itaSub4Data);
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

	// handle delete an ita sub 4 ajax request
	public function itaSub4Delete(Request $request) {
		$id = $request->id;
        $itaSub4 = Ita_sub_4::find($id);
        if(Storage::delete('public/files/ita/66/itaSub4/' . $itaSub4->file)) {
            Ita_sub_4::destroy($id);
            return response()->json([
                'status' => 200,
                'title' => 'Deleted!',
                'message' => 'ลบข้อมูล และ File เสร็จสิ้น',
                'icon' => 'success'
            ]);
        } else {
            Ita_sub_4::destroy($id);
            return response()->json([
                'status' => 200,
                'title' => 'Error!',
                'message' => 'ลบข้อมูลที่ไม่มี File เสร็จสิ้น',
                'icon' => 'error'
            ]);
        }
	}
}
