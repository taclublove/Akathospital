@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการข่าวประชาสัมพันธ์ทั่วไป</title>
@endsection

@section('modal')
    {{-- new user general press release start --}}
    <div class="modal fade" id="GeneralPressReleaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content w-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">เพิ่มข้อมูลข่าวประชาสัมพันธ์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="generalPressRelease_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="generalPressRelease_id" class="generalPressRelease_id" id="generalPressRelease_id">
                    <input type="hidden" name="generalPressRelease_file" id="generalPressRelease_file">
                    <input type="hidden" name="mode" id="mode" value="">

                    <div class="row mb-3 mx-3">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="title"
                                required>
                            <label for="floatingInput" class="mx-2">Title</label>
                        </div>
                    </div>

                    <div class="mb-3" style="margin-left: 8rem;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">สร้างด้วยตัวเอง</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">เพิ่ม File PDF</label>
                        </div>
                    </div>

                    <div class="row mb-3 mx-3" id="showInputTextarea">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="summernote" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3" id="showInputFile">
                        <label for="file"
                            class="col-md-4 col-form-label text-md-end">{{ __('เลือก File') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="file">
                            <input id="file" class="mt-2">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="generalPressRelease_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new general press release end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">การจัดการข่าวประชาสัมพันธ์ทั่วไป</h3>
                        <a href="{{ url('gprlCreate') }}" class="btn btn-light addIcon"><i
                                class="bi-plus-circle me-2"></i>เพิ่มข่าวประชาสัมพันธ์ทั่วไป</a>
                    </div>
                    <div class="card-body" id="show_all_generalPressRelease">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                    <div class="row mb-3 mx-3" id="showInputTextarea">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="summernote" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
    $('#summernote').summernote();
    });
</script>
@endsection
