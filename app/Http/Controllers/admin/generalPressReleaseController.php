<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GeneralPressRelease;

class generalPressReleaseController extends Controller
{
    public function index() {
        return view('admin.generalPressRelease.gprl');
    }

    public function gprlCreate() {
        $users = User::all();
        return view('admin.generalPressRelease.create', compact('users'));
    }

    // FetchAll GeneralPressRelease Start
    public function gprlFetchAll() {
        $gprls = GeneralPressRelease::all();
		$output = '';
		if ($gprls->count() > 0) {
			$output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>ชื่อผู้บันทึก</th>
                <th>หัวข้อของเนื้อหา</th>
                <th>เวลาที่เพิ่มข้อมูล</th>
                <th>เวลาที่อัพเดทข้อมูล</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($gprls as $gprl) {
				$output .= '<tr>
                <td>' . $gprl->id . '</td>
                <td>' . $gprl->user->fname . ' ' . $gprl->user->lname . '</td>
                <td>' . $gprl->title . '</td>
                <td>' . $gprl->created_at . '</td>
                <td>' . $gprl->updated_at . '</td>
                <td>
                    <a href="' . route('gprlEdit', ['id' => $gprl->id]) . '" class="text-success mx-1"><i class="bi-pencil-square h4"></i></a>
                    <a href="#" id="' . $gprl->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
    }
    // FetchAll GeneralPressRelease End

    // Add GeneralPressRelease Start
    public function gprlStore(Request $request) {

        $description = $request->description;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            $src = $img->getAttribute('src');

            if (strpos($src, 'data:image/') === 0) {
                $srcParts = explode(';', $src);

                if (isset($srcParts[1])) {
                    $base64Data = explode(',', $srcParts[1]);

                    if (isset($base64Data[1])) {
                        $data = base64_decode($base64Data[1]);

                        $image_name = "/uploadGprl/" . time(). $key.'.png';
                        file_put_contents(public_path().$image_name, $data);

                        $img->removeAttribute('src');
                        $img->setAttribute('src', $image_name);
                    } else {
                        // กรณี $base64Data ไม่มีตำแหน่งที่ 1
                        echo "Invalid base64 data format for image at index $key";
                    }
                } else {
                    // กรณี $srcParts ไม่มีตำแหน่งที่ 1
                    echo "Invalid src format for image at index $key";
                }
            }
        }

        $description = $dom->saveHTML();

        $image = $request->file('image');
        if($image) {
            $imageExtension = $image->getClientOriginalExtension();

            $allowedExtensions = ['png', 'jpg', 'jpeg'];

            if(in_array(strtolower($imageExtension), $allowedExtensions)) {
                $imageName = time() . '.' . $imageExtension;
                $image->storeAs('public/files/images/gprls', $imageName);

                $user_id = Auth::user()->id;

                $validatorTitle = Validator::make($request->all(), [
                    'title' => ['required', 'string', 'max:100'],
                ]);

                if($validatorTitle->fails()) {
                    session()->flash('message', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                    return redirect('gprlCreate');
                } else {
                    $gprls = GeneralPressRelease::create([
                        'title' => $request->title,
                        'user_id' => $user_id,
                        'image' => $imageName,
                        'description' => $description
                    ]);

                    if($gprls) {
                        session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                        return redirect('gprl');
                    } else {
                        session()->flash('status', 'บันทึกข้อมูลไม่สำเร็จ');
                        return redirect('gprlCreate');
                    }
                }
            }
        } else {
            $user_id = Auth::user()->id;
            $gprls = GeneralPressRelease::create([
                'title' => $request->title,
                'user_id' => $user_id,
                'image' => '',
                'description' => $description
            ]);

            if($gprls) {
                session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                return redirect('gprl');
            } else {
                session()->flash('status', 'บันทึกข้อมูลไม่สำเร็จ');
                return redirect('gprlCreate');
            }
        }
    }
    // Add GeneralPressRelease End

    // Edit GeneralPressRelease Start
    public function gprlEdit($id) {
        $gprls = GeneralPressRelease::find($id);
        return view('admin.generalPressRelease.edit', compact('gprls'));
    }
    // Edit GeneralPressRelease End

    // Update GeneralPressRelease Start
    public function gprlUpdate(Request $request, $id) {
        $gprls = GeneralPressRelease::find($id);

        $description = $request->description;

        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            $src = $img->getAttribute('src');

            if (strpos($src, 'data:image/') === 0) {
                $srcParts = explode(';', $src);

                if (isset($srcParts[1])) {
                    $base64Data = explode(',', $srcParts[1]);

                    if (isset($base64Data[1])) {
                        $data = base64_decode($base64Data[1]);

                        $image_name = "/uploadGprl/" . time(). $key.'.png';
                        file_put_contents(public_path().$image_name, $data);

                        $img->removeAttribute('src');
                        $img->setAttribute('src', $image_name);
                    } else {
                        // กรณี $base64Data ไม่มีตำแหน่งที่ 1
                        echo "Invalid base64 data format for image at index $key";
                    }
                } else {
                    // กรณี $srcParts ไม่มีตำแหน่งที่ 1
                    echo "Invalid src format for image at index $key";
                }
            }
        }

        $description = $dom->saveHTML();

        $user_id = Auth::user()->id;

        // ตรวจสอบ
        $validatorTitle = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:100'],
        ]);

        if($validatorTitle->fails()) {
            session()->flash('message', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
            return redirect('gprlCreate');
        } else {
            $gprls->update([
                'title' => $request->title,
                'user_id' => $user_id,
                'description' => $description
            ]);

            if($gprls) {
                session()->flash('status', 'แก้ไขข้อมูลเรียบร้อย');
                return redirect('gprl');
            } else {
                session()->flash('status', 'แก้ไขข้อมูลไม่สำเร็จ');
                return redirect('gprlCreate');
            }
        }
    }
    // Update GeneralPressRelease End

    // Delete GeneralPressRelease Start
    public function gprlDelete(Request $request) {
        $id = $request->id;
        $gprls = GeneralPressRelease::find($id);

        if(Storage::delete('public/files/images/gprls/' . $gprls->image)) {
            if(GeneralPressRelease::destroy($id)) {
                $dom= new DOMDocument();
                $dom->loadHTML($gprls->description,9);
                $images = $dom->getElementsByTagName('img');

                foreach ($images as $key => $img) {

                    $src = $img->getAttribute('src');
                    $path = Str::of($src)->after('/');

                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
                return response()->json([
                    'status' => 200,
                    'title' => 'Deleted!',
                    'message' => 'ลบข้อมูล และ Image เสร็จสิ้น',
                    'icon' => 'success'
                ]);
            }
        } else {
            return response()->json([
                'status' => 400,
                'title' => 'Error!',
                'message' => 'ไม่มีการลบไฟล์รูปภาพ',
                'icon' => 'error'
            ]);
        }
    }
    // Delete GeneralPressRelease End
}
