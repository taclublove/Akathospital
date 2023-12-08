<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    // public function gprlFetchAll() {
    //     $itaMains = Ita_main::all();
	// 	$output = '';
	// 	if ($itaMains->count() > 0) {
	// 		$output .= '<table class="table table-striped align-middle">
    //         <thead>
    //           <tr>
    //             <th>ID</th>
    //             <th>ชื่อผู้บันทึก</th>
    //             <th>หัวข้อของเนื้อหา</th>
    //             <th>คำอธิบาย</th>
    //             <th>Action</th>
    //           </tr>
    //         </thead>
    //         <tbody>';
	// 		foreach ($itaMains as $itaMain) {
	// 			$output .= '<tr>
    //             <td>' . $itaMain->id . '</td>
    //             <td>' . $itaMain->name_ita_main . '</td>
    //             <td>' . $itaMain->fiscalYear->fiscalYear_name . '</td>
    //             <td>' . $itaMain->description_ita_main . '</td>
    //             <td>
    //               <a href="gprlEdit/{{'. $itaMain->id .'}} " class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#ItaMainModal"><i class="bi-pencil-square h4"></i></a>
    //               <a href="#"   class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
    //             </td>
    //           </tr>';
	// 		}
	// 		$output .= '</tbody></table>';
	// 		echo $output;
	// 	} else {
	// 		echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
	// 	}
    // }

    public function gprlStore(request $request) {

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

        // ตรวจสอบ
        $validatorTitle = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:100'],
        ]);

        if($validatorTitle->fails()) {
            session()->flash('message', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
            return redirect('gprlCreate');
        } else {
            $gprls = GeneralPressRelease::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'description' => $request->description
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
}
