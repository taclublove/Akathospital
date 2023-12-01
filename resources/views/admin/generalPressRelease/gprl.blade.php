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
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#GeneralPressReleaseModal"><i
                                class="bi-plus-circle me-2"></i>เพิ่มข่าวประชาสัมพันธ์ทั่วไป</button>
                    </div>
                    <div class="card-body" id="show_all_generalPressRelease">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                    {{-- <div class="row mb-3 mx-3" id="showInputTextarea">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="summernote" required></textarea>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                // toolbar: [
                //     ['style', ['style']],
                //     ['font', ['bold', 'underline', 'clear']],
                //     ['fontname', ['fontname']],
                //     ['color', ['color']],
                //     ['para', ['ul', 'ol', 'paragraph']],
                //     ['table', ['table']],
                //     ['insert', ['link', 'picture', 'video']],
                //     ['view', ['fullscreen', 'codeview', 'help']],
                // ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Saraban', 'Arial', 'Sans-Serif'],
                fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Saraban', 'Arial', 'Sans-Serif'],
            });
        });

        $('.addIcon').on('click', function() {
            $('#title').text('เพิ่มข้อมูลข่าวประชาสัมพันธ์ทั่วไป');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#generalPressRelease_form")[0].reset();
            $('#showInputFile').hide();
            $('#showInputTextarea').hide();
            $('#file').hide();
            $('#inlineRadio1').on('click', function() {
                $('#showInputTextarea').show();
                $('#showInputFile').hide();
            });
            $('#inlineRadio2').on('click', function() {
                $('#showInputFile').show();
                $('#showInputTextarea').hide();
            });
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ข้อมูลข่าวประชาสัมพันธ์ทั่วไป');
            $('#mode').attr('value', 'edit');
            $('#showInputFile').hide();
            $('#showInputLink').hide();
            $('#file').attr('readonly', true).show();
            $('#inlineRadio1').on('click', function() {
                $('#showInputFile').show();
                $('#showInputLink').hide();
            });
            $('#inlineRadio2').on('click', function() {
                $('#showInputFile').hide();
                $('#showInputLink').show();
            });
        });

        function clearEditForm() {
            $('#file').empty();
            $("#generalPressRelease_form")[0].reset();
        }

        $(function() {

            // add new general press release ajax request
            $("#generalPressRelease_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('generalPressReleaseStore') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response) {
                                Swal.fire(
                                    response.title,
                                    response.message,
                                    response.icon
                                )
                                fetchAllGeneralPressRelease();
                            }
                            $("#generalPressRelease_form")[0].reset();
                            $("#GeneralPressReleaseModal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('generalPressReleaseUpdate') }}',
                        method: 'post',
                        data: fd,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response) {
                                Swal.fire(
                                    response.title,
                                    response.message,
                                    response.icon
                                )
                                fetchAllGeneralPressRelease();
                            }
                            $("#generalPressRelease_form")[0].reset();
                            $("#generalPressReleaseModal").modal('hide');
                        }
                    });
                }
            });

            // edit general press release ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('generalPressReleaseEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#title").val(response.title);
                        $("#summernote").val(response.description);
                        $("#file").val(response.file);
                        $("#generalPressRelease_id").val(response.id);
                        $("#generalPressRelease_file").val(response.file);
                    }
                });
            });

            // delete general press release ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';

                Swal.fire({
                    title: 'Are you sure?',
                    text: "คุณต้องการลบข้อมูลใช่หรือไม่",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่ฉันต้องการลบ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('generalPressReleaseDelete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    response.title,
                                    response.message,
                                    response.icon
                                )
                                fetchAllGeneralPressRelease();
                            }
                        });
                    }
                })
            });

            // fetch all general press release ajax request
            fetchAllGeneralPressRelease();

            function fetchAllGeneralPressRelease() {
                $.ajax({
                    url: '{{ route('generalPressReleaseFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_generalPressRelease").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
