@extends('admin.dashboardEditor')

@section('title')
    <title>เพิ่มข้อมูลข่าวประชาสัมพันธ์ทั่วไป</title>
@endsection

@section('content')
    <h1 class="text-center">เพิ่มข้อมูลข่าวประชาสัมพันธ์ทั่วไป</h1>
    <form method="POST" action="/post" id="gprlForm">
        @csrf
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="title"
                required>
            <label for="floatingInput">หัวข้อ</label>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" id="summernote" required></textarea>
        </div>
        <input type="file" id="fileInput" accept=".pdf" style="display:none;">
        <div class="d-flex justify-content-between ">
            <div class="">
                <a href="{{ url('gprl') }}" type=”submit” class="btn btn-danger mt-3 d-flex ">ยกเลิก</a>
            </div>
            <div class="">
                <button type=”submit” class="btn btn-primary mt-3 d-flex ">บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>

    </script>
@endsection
