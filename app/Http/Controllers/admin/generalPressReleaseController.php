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
    // เมื่อเข้าสู่ function index ให้ส่งผู้ใช้งานไปยังหน้า gprl Start
        public function index() {
            return view('admin.generalPressRelease.gprl');
        }
    // เมื่อเข้าสู่ function index ให้ส่งผู้ใช้งานไปยังหน้า gprl End

    // เมื่อเข้าสู่ Function gprlsCreate ให้ส่งผู้ใช้งานไปยังหน้าสำหรับบันทึกข้อมูลลง Database Start
        public function gprlCreate() {
            $users = User::all();
            return view('admin.generalPressRelease.create', compact('users'));
        }
    // เมื่อเข้าสู่ Function gprlsCreate ให้ส่งผู้ใช้งานไปยังหน้าสำหรับบันทึกข้อมูลลง Database End

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
                    <th>image</th>
                    <th>pdf</th>
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
                    <td>' . $gprl->image . '</td>
                    <td>' . $gprl->pdf . '</td>
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

            // ตัวแปร description ที่เก็บข้อมูลจากการส่ง request มาจาก description ของหน้ากรอกข้อมูล
            $description = $request->description;

            // ตัวแปร pdf ที่เก็บข้อมูลจากการส่ง request มาจาก pdf ของหน้ากรอกข้อมูล
            $pdf = $request->pdf;

            // เมื่อมีข้อมูลจาก description ถึงทำตามเงื่อนไขด้านล่าง
            if($description) {
                // สร้าง Object ของ Class DOMDocument
                $dom = new DOMDocument();
                // เข้าถึงการ loadHTML เพื่อโหลดเนื้อหา HTML ลงใน Object DOMDocument
                // LIBXML_HTML_NOIMPLIED = ไม่เพิ่ม <html> และ <body> โดยอัตโนมัติ
                // LIBXML_HTML_NODEFDTD = ไม่เพิ่ม DTD (Document Type Definition) โดยอัตโนมัติ
                $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                // ตัวแปรที่เก็บข้อมูลจากการเข้าถึงของ DOMDocument เข้าถึง Tag ของ img ที่มาจาก Editor ไปเก็บไว้ในตัวแปร $images
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $key => $img) {
                    // ตัวแปร src เข้าถึง Attribute ของ src ที่อยู่ใน Tag ของ img
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
                            session()->flash('error', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                            return redirect('gprlCreate');
                        } else {
                            $gprls = GeneralPressRelease::create([
                                'title' => $request->title,
                                'user_id' => $user_id,
                                'image' => $imageName,
                                'pdf' => '',
                                'description' => $description
                            ]);

                            if($gprls) {
                                session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                                return redirect('gprl');
                            } else {
                                session()->flash('error', 'บันทึกข้อมูลไม่สำเร็จ');
                                return redirect('gprlCreate');
                            }
                        }
                    }
                } else {
                    session()->flash('error', 'กรุณาเพิ่มภาพหน้าปก');
                    return redirect('gprlCreate');
                }
            // เมื่อมีข้อมูลจาก pdf ถึงทำตามเงื่อนไขด้านล่าง
            } elseif($pdf) {
                // ตัวแปร pdf เข้าถึง file ที่มี name คือ pdf จากหน้าส่งข้อมูล
                $pdf = $request->file('pdf');

                if($pdf) {
                    $pdfExtension = $pdf->getClientOriginalExtension();

                    $allowedExtensions = ['pdf'];

                    if(in_array(strtolower($pdfExtension), $allowedExtensions)) {
                        $pdfName = time() . '.' . $pdfExtension;
                        $pdf->storeAs('public/files/pdfs/gprls', $pdfName);
                        $user_id = Auth::user()->id;

                        $validatorTitle = Validator::make($request->all(), [
                            'title' => ['required', 'string', 'max:100'],
                        ]);

                        if($validatorTitle->fails()) {
                            session()->flash('error', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                            return redirect('gprlCreate');
                        } else {
                            $gprls = GeneralPressRelease::create([
                                'title' => $request->title,
                                'user_id' => $user_id,
                                'image' => '',
                                'pdf' => $pdfName,
                                'description' => ''
                            ]);

                            if($gprls) {
                                session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                                return redirect('gprl');
                            } else {
                                session()->flash('error', 'บันทึกข้อมูลไม่สำเร็จ');
                                return redirect('gprlCreate');
                            }
                        }
                    }
                } else {
                    session()->flash('error', 'กรุณาเพิ่ม File PDF ก่อนบันทึก');
                    return redirect('gprlCreate');
                }
            } elseif($description == '' && $pdf == '') {
                session()->flash('error', 'กรูณาเพิ่ม File Image หรือ File PDF อย่างใดอย่างนึงก่อนบันทึก');
                return redirect('gprlCreate');
            } else {
                session()->flash('error', 'ไม่มีข้อมูลผิดพลาดกรุณาแจ้งปัญหากับทีม IT เพื่อตรวจหา BUG ของระบบ ขอบคุณครับ/คะ');
                return redirect('gprlCreate');
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
        // ตัวแปรเก็บ ID ที่นำไปค้นหาใน Database
        $gprls = GeneralPressRelease::find($id);

        // ตัวแปรเก็บการเข้าถึง request ของ description
        $description = $request->description;
        // ตัวแปรเก็บการเข้าถึง request ของ pdf
        $pdf = $request->pdf;

        if(isset($description)) {
            if($gprls->pdf != '') {
                session()->flash('error', 'มีข้อมูล pdf ตัวเก่าบน database');
                return redirect('gprlEdit/' . $id);
                Storage::delete('public/files/pdfs/gprls/' . $gprls->pdf);
                if($request->hasFile('image')) {
                    $imageFile = $request->file('image');
                    $imageExtensions = $imageFile->getClientOriginalExtension();
                    $allowedExtensions = ['png', 'jpeg', 'jpg'];
                    if(in_array(strtolower($imageExtensions), $allowedExtensions)) {
                        $imageName = time() . '.' . $imageExtensions;
                        $imageFile->storeAs('public/files/images/gprls', $imageName);
                        $dom = new DOMDocument();
                        // เข้าถึงการ loadHTML เพื่อโหลดเนื้อหา HTML ลงใน Object DOMDocument
                        // LIBXML_HTML_NOIMPLIED = ไม่เพิ่ม <html> และ <body> โดยอัตโนมัติ
                        // LIBXML_HTML_NODEFDTD = ไม่เพิ่ม DTD (Document Type Definition) โดยอัตโนมัติ
                        $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                        // ตัวแปรที่เก็บข้อมูลจากการเข้าถึงของ DOMDocument เข้าถึง Tag ของ img ที่มาจาก Editor ไปเก็บไว้ในตัวแปร $images
                        $images = $dom->getElementsByTagName('img');
                        foreach ($images as $key => $img) {
                            // ตัวแปร src เข้าถึง Attribute ของ src ที่อยู่ใน Tag ของ img
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
                    }
                } else {
                    session()->flash('error', 'ไม่มีไฟล์ภาพหน้าปกกรุณาเพิ่มไฟล์ภาพหน้าปกก่อนบันทึก');
                    return redirect('gprlEdit/' . $id);
                }

            // Check ตรวจสอบเมื่อมีการส่ง request ที่มี File เข้ามาให้ทำตามกระบวนการด้านล่าง Start
            } elseif($request->hasFile('pdf')) {
                // Delete image ใน Editor Start
                $dom = new DOMDocument();
                // เข้าถึงการ loadHTML เพื่อโหลดเนื้อหา HTML ลงใน Object DOMDocument
                // LIBXML_HTML_NOIMPLIED = ไม่เพิ่ม <html> และ <body> โดยอัตโนมัติ
                // LIBXML_HTML_NODEFDTD = ไม่เพิ่ม DTD (Document Type Definition) โดยอัตโนมัติ
                $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                // ตัวแปรที่เก็บข้อมูลจากการเข้าถึงของ DOMDocument เข้าถึง Tag ของ img ที่มาจาก Editor ไปเก็บไว้ในตัวแปร $images
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $key => $img) {
                    // ตัวแปร src เข้าถึง Attribute ของ src ที่อยู่ใน Tag ของ img
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
                // Delete image ใน Editor End

                // Check & Delete รูปภาพหน้าปก Start
                if($gprls->image) {
                    Storage::delete('public/files/images/gprls/' . $gprls->image);
                    $pdfFile = $request->file('pdf');
                    if($pdfFile) {
                        $pdfExtensions = $pdfFile->getClientOriginalExtension();
                        $allowedExtensions = ['pdf'];
                        if(in_array(strtolower($pdfExtensions), $allowedExtensions)) {
                            $pdfName = time() . '.' . $pdfExtensions;
                            $pdfFile->storeAs('public/files/pdfs/gprls', $pdfName);
                            $user_id = Auth::user()->id;

                            $validatorTitle = Validator::make($request->all(), [
                                'title' => ['required', 'string', 'max:100'],
                            ]);

                            if($validatorTitle->fails()) {
                                session()->flash('error', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                                return redirect('gprlEdit/' . $id);
                            } else {
                                $gprls->update([
                                    'title' => $request->title,
                                    'user_id' => $user_id,
                                    'image' => '',
                                    'pdf' => $pdfName,
                                    'description' => ''
                                ]);

                                if($gprls) {
                                    session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                                    return redirect('gprl');
                                } else {
                                    session()->flash('error', 'บันทึกข้อมูลไม่สำเร็จ');
                                    return redirect('gprlEdit/' . $id);
                                }
                            }
                        } else {
                            session()->flash('error', 'สกุล File ไม่ถูกต้องกรุณาใช้สกุล File [ pdf ]');
                            return redirect('gprlEdit/' . $id);
                        }
                    } else {
                        session()->flash('error', 'ไม่มี File PDF กรุณาเพิ่ม File');
                        return redirect('gprlEdit/' . $id);
                    }
                }
                // Check & Delete รูปภาพหน้าปก End
            // Check ตรวจสอบเมื่อมีการส่ง request ที่มี File เข้ามาให้ทำตามกระบวนการด้านล่าง End

            // Check ตรวจสอบเมื่อมีการแก้ไขแค่ Image Title และ description โดยไม่มีการเพิ่ม File PDF ถึงเข้าเงื่อนไขด้านล่าง Start
            } else {
                if($request->hasFile('image')) {
                    // session()->flash('error', 'มีไฟล์ Image ตัวใหม่ส่งเข้ามา');
                    // return redirect('gprlEdit/' . $id);
                    $imageFile = $request->file('image');
                    Storage::delete('public/files/images/gprls/' . $gprls->image);
                    if($imageFile) {
                        $imageExtensions = $imageFile->getClientOriginalExtension();
                        $allowedExtensions = ['png', 'jpeg', 'jpg'];
                        if(in_array(strtolower($imageExtensions), $allowedExtensions)) {
                            $imageName = time() . '.' . $imageExtensions;
                            $imageFile->storeAs('public/files/images/gprls', $imageName);

                            // Delete image ใน Editor Start
                            $dom = new DOMDocument();
                            // เข้าถึงการ loadHTML เพื่อโหลดเนื้อหา HTML ลงใน Object DOMDocument
                            // LIBXML_HTML_NOIMPLIED = ไม่เพิ่ม <html> และ <body> โดยอัตโนมัติ
                            // LIBXML_HTML_NODEFDTD = ไม่เพิ่ม DTD (Document Type Definition) โดยอัตโนมัติ
                            $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                            // ตัวแปรที่เก็บข้อมูลจากการเข้าถึงของ DOMDocument เข้าถึง Tag ของ img ที่มาจาก Editor ไปเก็บไว้ในตัวแปร $images
                            $images = $dom->getElementsByTagName('img');
                            foreach ($images as $key => $img) {
                                // ตัวแปร src เข้าถึง Attribute ของ src ที่อยู่ใน Tag ของ img
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
                            // Delete image ใน Editor End

                            $user_id = Auth::user()->id;

                            $validatorTitle = Validator::make($request->all(), [
                                'title' => ['required', 'string', 'max:100'],
                            ]);

                            if($validatorTitle->fails()) {
                                session()->flash('error', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                                return redirect('gprlEdit/' . $id);
                            } else {
                                $gprls->update([
                                    'title' => $request->title,
                                    'user_id' => $user_id,
                                    'image' => $imageName,
                                    'pdf' => '',
                                    'description' => $description
                                ]);

                                if($gprls) {
                                    session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                                    return redirect('gprl');
                                } else {
                                    session()->flash('error', 'บันทึกข้อมูลไม่สำเร็จ');
                                    return redirect('gprlEdit/' . $id);
                                }
                            }
                        } else {
                            session()->flash('error', 'สกุล File ไม่ถูกต้องกรุณาใช้สกุล File [ png, jpeg, jpg ]');
                            return redirect('gprlEdit/' . $id);
                        }
                    } else {
                        session()->flash('error', 'ไม่มี File Image กรุณาเพิ่ม File');
                        return redirect('gprlEdit/' . $id);
                    }
                } elseif($gprls->image) {
                    // Delete image ใน Editor Start
                    $dom = new DOMDocument();
                    // เข้าถึงการ loadHTML เพื่อโหลดเนื้อหา HTML ลงใน Object DOMDocument
                    // LIBXML_HTML_NOIMPLIED = ไม่เพิ่ม <html> และ <body> โดยอัตโนมัติ
                    // LIBXML_HTML_NODEFDTD = ไม่เพิ่ม DTD (Document Type Definition) โดยอัตโนมัติ
                    $dom->loadHTML('<?xml encoding="UTF-8">' . $description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    // ตัวแปรที่เก็บข้อมูลจากการเข้าถึงของ DOMDocument เข้าถึง Tag ของ img ที่มาจาก Editor ไปเก็บไว้ในตัวแปร $images
                    $images = $dom->getElementsByTagName('img');
                    foreach ($images as $key => $img) {
                        // ตัวแปร src เข้าถึง Attribute ของ src ที่อยู่ใน Tag ของ img
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
                    // Delete image ใน Editor End
                    $user_id = Auth::user()->id;

                    $validatorTitle = Validator::make($request->all(), [
                        'title' => ['required', 'string', 'max:100'],
                    ]);

                    if($validatorTitle->fails()) {
                        session()->flash('error', 'Title ของคุณสามารถตั้งได้ไม่เกิน 100 ตัวอักษร');
                        return redirect('gprlEdit/' . $id);
                    } else {
                        $gprls->update([
                            'title' => $request->title,
                            'user_id' => $user_id,
                            'image' => $gprls->image,
                            'pdf' => '',
                            'description' => $description
                        ]);

                        if($gprls) {
                            session()->flash('status', 'บันทึกข้อมูลเรียบร้อย');
                            return redirect('gprl');
                        } else {
                            session()->flash('error', 'บันทึกข้อมูลไม่สำเร็จ');
                            return redirect('gprlEdit/' . $id);
                        }
                    }
                } else {
                    session()->flash('error', 'ไม่เข้าเงื่อนไขทั้ง 2');
                    return redirect('gprlEdit/' . $id);
                }
            }
            // Check ตรวจสอบเมื่อมีการแก้ไขแค่ Image Title และ description โดยไม่มีการเพิ่ม File PDF ถึงเข้าเงื่อนไขด้านล่าง End
        }
    }
    // Update GeneralPressRelease End

    // Delete GeneralPressRelease Start
    public function gprlDelete(Request $request) {
        $id = $request->id;
        $gprls = GeneralPressRelease::find($id);

        if($gprls->image != '' && $gprls->pdf == '') {
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
        } elseif($gprls->pdf != '' && $gprls->image == '') {
            if(Storage::delete('public/files/pdfs/gprls/' . $gprls->pdf)) {
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
                        'message' => 'ลบข้อมูล และ PDF เสร็จสิ้น',
                        'icon' => 'success'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'title' => 'Error!',
                    'message' => 'ไม่มีการลบไฟล์ PDF',
                    'icon' => 'error'
                ]);
            }
        } elseif($gprls->pdf == '' && $gprls->image == '') {
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

            if(Storage::delete('public/files/pdfs/gprls/' . $gprls->pdf)) {
                if(GeneralPressRelease::destroy($id)) {
                    return response()->json([
                        'status' => 200,
                        'title' => 'Deleted!',
                        'message' => 'ลบข้อมูลที่ไม่มี Image และ PDF เสร็จสิ้น',
                        'icon' => 'success'
                    ]);
                } else {
                    return response()->json([
                        'status' => 400,
                        'title' => 'Error!',
                        'message' => 'ลบข้อมูลไม่สำเร็จ',
                        'icon' => 'error'
                    ]);
                }
            }
        }
    }
    // Delete GeneralPressRelease End
}
