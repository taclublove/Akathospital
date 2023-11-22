<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefix;
use App\Models\Sex;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class officerController extends Controller
{
    // set index page view
	public function index() {
        $prefixes = Prefix::all();
        $types = Type::all();
        $sexes = Sex::all();
        $user = User::all();
		return view('admin.officer.ofc', compact('prefixes', 'types', 'sexes', 'user'));
	}

	// handle fetch all user ajax request
	public function userFetchAll() {
		$users = User::all();
		$output = '';
		if ($users->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ - นามสกุล</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>สถานะ</th>
                <th>เพศ</th>
                <th>รูปภาพ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($users as $user) {
				$output .= '<tr>
                <td>' . $user->id . '</td>
                <td>' . $user->prefix->prefix_name . '</td>
                <td>' . $user->fname . ' ' . $user->lname . '</td>
                <td>' . $user->username . '</td>
                <td>' . $user->email . '</td>
                <td>' . $user->type->type_name . '</td>
                <td>' . $user->sex->sex_name . '</td>
                <td><img src="storage/images/users/' . $user->image . '" width="50" class="img-thumbnail rounded-5" ></td>
                <td>
                  <a href="#" id="' . $user->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#UserModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $user->id . '"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new user ajax request
	public function userStore(Request $request) {

        $request->validate([
            'prefix_id' => ['required', 'string', 'max:50', 'exists:prefixes,id'],
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:20', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'email' => 'unique:users,email'],
            'type_id' => ['required', 'string', 'max:10', 'exists:types,id'],
            'sex_id' => ['required', 'string', 'max:10', 'exists:sexes,id'],
        ]);


        $validatorPassword1 = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'confirmed',
                'regex:/^[A-Za-z0-9!@#$%^&*()_+{}|:"<>?~\\[-\\];.,\\/]{1,}$/',
            ],
        ]);

        if($validatorPassword1->fails()) {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'รหัสผ่านต้องใช้เป็นภาษาอังกฤษ ตัวเลข อักขระพิเศษเท่านั้น',
                'icon' => 'error'
            ]);
        } else {
            $validatorPassword2 = Validator::make($request->all(), [
                'password' => [
                    'required',
                    'string',
                    'min: 8',
                    'confirmed',
                ],
            ]);

            if($validatorPassword2->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
                    'icon' => 'error'
                ]);
            } else {
                $validatorUsername = Validator::make($request->all() , [
                    'username' => [
                        'required',
                        'regex:/^[A-Za-z0-9!@#$%^&*()_+{}|:"<>?~\\[-\\];.,\\/]{1,}$/',
                    ],
                ]);

                if($validatorUsername->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'Username ต้องใช้เป็นภาษาอังกฤษ ตัวเลข อักขระพิเศษเท่านั้น',
                        'icon' => 'error'
                    ]);
                } else {
                    $file = $request->file('image');
                    if($file) {
                        $fileExtension = $file->getClientOriginalExtension();

                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

                        if(in_array(strtolower($fileExtension), $allowedExtensions)) {
                            $fileName = time() . '.' . $fileExtension;
                            $file->storeAs('public/images/users', $fileName);

                            $userData = [
                                'prefix_id' => $request->prefix_id,
                                'fname' => $request->fname,
                                'lname' => $request->lname,
                                'username' => $request->username,
                                'email' => $request->email,
                                'password' => Hash::make($request->password),
                                'type_id' => $request->type_id,
                                'sex_id' => $request->sex_id,
                                'image' => $fileName
                            ];

                            User::create($userData);
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
                                'message' => 'ไฟล์ของคุณนามสกุลไม่ถูกต้องกรุณาใช้นามสกุล : jpg, jpeg, png, gif',
                                'icon' => 'error'
                            ]);
                        }
                    }
                }
            }
        }
	}

	// handle edit an user ajax request
	public function userEdit(Request $request) {
		$id = $request->id;
		$user = User::find($id);
		return response()->json($user);
	}

	// handle update an user ajax request
	public function userUpdate(Request $request) {
		$fileName = '';
		$user = User::find($request->user_id);
		if ($request->hasFile('image')) {
            $validatorPassword1 = Validator::make($request->all(), [
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'regex:/^[A-Za-z0-9!@#$%^&*()_+{}|:"<>?~\\[-\\];.,\\/]{1,}$/',
                ],
            ]);

            if($validatorPassword1->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'รหัสผ่านต้องใช้เป็นภาษาอังกฤษ ตัวเลข อักขระพิเศษเท่านั้น',
                    'icon' => 'error'
                ]);
            } else {
                $validatorPassword2 = Validator::make($request->all(), [
                    'password' => [
                        'required',
                        'string',
                        'min: 8',
                        'confirmed',
                    ],
                ]);

                if($validatorPassword2->fails()) {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
                        'icon' => 'error'
                    ]);
                } else {
                    $validatorUsername = Validator::make($request->all() , [
                        'username' => [
                            'required',
                            'regex:/^[A-Za-z0-9!@#$%^&*()_+{}|:"<>?~\\[-\\];.,\\/]{1,}$/',
                        ],
                    ]);

                    if($validatorUsername->fails()) {
                        return response()->json([
                            'status' => 400,
                            'title' => 'Error!',
                            'message' => 'Username ต้องใช้เป็นภาษาอังกฤษ ตัวเลข อักขระพิเศษเท่านั้น',
                            'icon' => 'error'
                        ]);
                    } else {
                        $file = $request->file('image');
                        if($file) {
                            $fileExtensions = $file->getClientOriginalExtension();
                            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                            if(in_array(strtolower($fileExtensions), $allowedExtensions)) {
                                $fileName = time() . '.' . $fileExtensions;
                                $file->storeAs('public/images/users', $fileName);
                                if($user) {
                                    Storage::delete('public/images/users/' . $user->image);
                                } else {
                                    return response()->json([
                                        'status' => 400,
                                        'title' => 'Error!',
                                        'message' => 'ลบรูปเก่าไม่สำเร็จ',
                                        'icon' => 'error'
                                    ]);
                                }
                            } else {
                                return response()->json([
                                    'status' => 400,
                                    'title' => 'Error!',
                                    'message' => 'นามสกุลไฟล์ของคุณไม่ถูกต้องกรุณาใช้สกุลไฟล์ : jpg, jpeg, png ,gif',
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
                    }
                }
            }
		} else{
            $fileName = $request->user_image;
		}
        $userData = [
            'prefix_id' => $request->prefix_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'type_id' => $request->type_id,
            'sex_id' => $request->sex_id,
            'image' => $fileName
        ];
        if($userData) {
            $user->update($userData);
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

	// handle delete an user ajax request
	public function userDelete(Request $request) {
		$id = $request->id;
        $user = User::find($id);
        if(Storage::delete('public/images/users/' . $user->image)) {
            User::destroy($id);
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

    // Check Username && Email
    public function userCheck(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');

        if($username) {
            $userExists = User::where('username', $username)->exists();
            return response()->json([
                'status' => 'username',
                'exists' => $userExists
            ]);
        } else if($email) {
            $emailExists = User::where('email', $email)->exists();
            return response()->json([
                'status' => 'email',
                'exists' => $emailExists
            ]);
        } else {

        }
    }
}
