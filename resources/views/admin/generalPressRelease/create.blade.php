@extends('admin.dashboardEditor')

@section('title')
    <title>เพิ่มข้อมูลข่าวประชาสัมพันธ์ทั่วไป</title>
@endsection

@section('content')
    <h1 class="text-center">เพิ่มข้อมูลข่าวประชาสัมพันธ์ทั่วไป</h1>
    <form method="POST" action="{{ route('gprlStore') }}" id="gprlForm">
        @csrf
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
            <label for="floatingInput">หัวข้อ</label>
        </div>

        <fieldset disabled>
            <div class="mb-3">
                <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                    class="form-control" placeholder="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" required>
            </div>
        </fieldset>

        <div class="form-group">
            <textarea class="form-control" name="description" id="summernote" required></textarea>
        </div>

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
        {{-- <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> --}}
        <!-- Modal -->
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
    <script></script>
@endsection
