@extends('admin.dashboardEditor')

@section('title')
    <title>แก้ไขข้อมูลข่าวประชาสัมพันธ์ทั่วไป</title>
@endsection

@section('content')
    <h1 class="text-center">แก้ไขข้อมูลข่าวประชาสัมพันธ์ทั่วไป</h1>
    <form method="POST" action="{{ route('gprlUpdate', ['id' => $gprls->id]) }}" id="gprlForm">
        @csrf
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $gprls->title }}" required>
            <label for="floatingInput">หัวข้อ</label>
        </div>

        <fieldset disabled>
            <div class="mb-3">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                    class="form-control" placeholder="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" required>
            </div>
        </fieldset>

        <label class="form-check-label mb-1" for="inlineRadio1">ส่วนที่ 1</label>
        <div class="mb-3" >
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="showAddImage" value="option1">
                <label class="form-check-label" for="inlineRadio1">ต้องการเพิ่มภาพหน้าปก</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="dontShowAddImage" value="option2">
                <label class="form-check-label" for="inlineRadio2">ไม่ต้องการเพิ่มภาพหน้าปก</label>
            </div>
        </div>

        @if($gprls->description != '' && $gprls->pdf == '')
        <div class="mb-3" id="addImage">
            <input type="file" class="form-control" name="image" id="image">
            <div id="image"></div>
        </div>
        @endif

        <hr>

        <label class="form-check-label mb-1" for="inlineRadio1">ส่วนที่ 2</label>
        @if($gprls->pdf != '' && $gprls->description == '')
        <div class="mb-3" id="addPDF">
            <label class="form-check-label mb-1" for="inlineRadio1">เพิ่ม File PDF ด้านล่าง</label>
            <input type="file" class="form-control" name="pdf" id="pdf">
        </div>
        @endif

        @if($gprls->description != '' && $gprls->pdf == '')
            <div class="form-group" id="addEditor">
                <label class="form-check-label mb-1" for="inlineRadio1">สร้างหน้าข่าวสารด้านล่าง</label>
                <textarea class="form-control" name="description" id="summernote">{{ $gprls->description }}</textarea>
            </div>
        @endif

        <hr>

        <div class="d-flex justify-content-between ">
            <div class="">
                <a href="{{ url('gprl') }}" type=”submit” class="btn btn-danger mt-3 d-flex ">ยกเลิก</a>
            </div>
            <div class="">
                <button type="submit" id="submitForm" class="btn btn-primary mt-3 d-flex ">บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
    @if (session('status'))
        <div class="modal fade" id="refreshModal" tabindex="-1" aria-labelledby="refreshModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="refreshModalLabel">ระบบแจ้งเตือน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('status') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>

        // คำสั่งการนำ ID มากำหนดเมื่อมีการ Click เพื่อเลือกระหว่าง : ต้องการเพิ่มภาพหน้าปก กับ ไม่ต้องการเพิ่มภาพหน้าปก Start
            // ดึง ID ของปุ่มต้องการเพิ่มภาพหน้าปก
            const showAddImage = document.getElementById('showAddImage');
            // ดึง ID ของปุ่มไม่ต้องการเพิ่มภาพหน้าปก
            const dontShowAddImage = document.getElementById('dontShowAddImage');
            // ดึง ID ของปุ่มเพิ่มFile หรือ Input type file
            const addImage = document.getElementById('addImage');
            // ดึง ID ของปุ่มเพิ่มFile หรือ Input type file
            const addPDF = document.getElementById('addPDF');
            // ดึง ID ของปุ่มเพิ่มFile หรือ Input type file
            const addEditor = document.getElementById('addEditor');

            // ปิดการแสดงผลของ input type file Start
                // ปิดการแสดงผลของ Item ที่มี ID addImage
                // addImage.style.display = 'none';
                // ปิดการแสดงผลของ Item ที่มี ID addPDF
                // addPDF.style.display = 'none';
                // ปิดการแสดงผลของ Item ที่มี ID addEditor
                // addEditor.style.display = 'none';
            // ปิดการแสดงผลของ input type file End

            // เป็นการตรวจเช็คปุ่มไม่ต้องการเพิ่มภาพหน้าปก = จริง เพื่อที่จะไม่ให้แสดงผลเมื่อมีการเปิดมายังหน้านี้
            // dontShowAddImage.checked = true;

            // เมื่อมีการคลิกที่ปุ่มต้องการเพิ่มภาพหน้าปกให้ทำการแสดงในส่วนของ input type file
            showAddImage.addEventListener('click', function() {
                // แสดงผลของ Item ที่มี ID addImage
                addImage.style.display = 'block';
                // ปิดการแสดงผลของ Item ที่มี ID addPDF
                addPDF.style.display = 'none';
                // แสดงผลของ Item ที่มี ID addEditor
                addEditor.style.display = 'block';
            });

            // เมื่อมีการคลิกที่ปุ่มไม่ต้องการเพิ่มภาพหน้าปกให้ทำการปิดในส่วนของ input type file
            dontShowAddImage.addEventListener('click', function() {
                // ปิดการแสดงผลของ Item ที่มี ID addImage
                addImage.style.display = 'none';
                // แสดงผลของ Item ที่มี ID addPDF
                addPDF.style.display = 'block';
                // ปิดการแสดงผลของ Item ที่มี ID addEditor
                addEditor.style.display = 'none';
            });
        // คำสั่งการนำ ID มากำหนดเมื่อมีการ Click เพื่อเลือกระหว่าง : ต้องการเพิ่มภาพหน้าปก กับ ไม่ต้องการเพิ่มภาพหน้าปก End

    </script>
@endsection
