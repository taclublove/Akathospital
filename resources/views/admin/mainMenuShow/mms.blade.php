@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ Main Menu Show</title>
@endsection

@section('modal')
    {{-- new main menu show start --}}
    <div class="modal fade" id="MainMenuShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Main Menu Show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="main_menu_show_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="main_menu_show_id" class="main_menu_show_id" id="main_menu_show_id">
                    <input type="hidden" name="mode" id="mode" value="">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อปุ่ม') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('main_menu_show_name') is-invalid @enderror" name="main_menu_show_name"
                                id="main_menu_show_name" required autocomplete="main_menu_show_name" autofocus>

                            @error('main_menu_show_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3" style="margin-left: 10rem;" id="form-link">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">ต้องการเพิ่ม Link</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">ไม่ต้องการเพิ่ม Link</label>
                        </div>
                    </div>

                    <div class="row mb-3" id="showInputLink">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link"
                                id="link" autocomplete="link" autofocus>

                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="main_menu_show_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new main menu show modal end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Main Menu Show</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#MainMenuShowModal"><i
                                class="bi-plus-circle me-2"></i>Add New Main Menu Show</button>
                    </div>
                    <div class="card-body" id="show_all_main_menu_show">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('.addIcon').on('click', function() {
            $('#title').text('Add new main menu show');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#main_menu_show_form")[0].reset();
            $('#showInputLink').hide();
            $('#inlineRadio1').on('click', function() {
                $('#showInputLink').show();
            });
            $('#inlineRadio2').on('click', function() {
                $('#showInputLink').hide();
            });
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update main menu show');
            $('#mode').attr('value', 'edit');
            $('#showInputLink').show();
            $('#form-link').hide();
        });

        function clearEditForm() {
            $('#file').empty();
            $("#main_menu_show_form")[0].reset();
        }

        $(function() {

            // add new main menu show ajax request
            $("#main_menu_show_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('mainMenuShowStore') }}',
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
                                fetchAllMainMenuShow();
                            }
                            $("#main_menu_show_form")[0].reset();
                            $("#MainMenuShowModal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('mainMenuShowUpdate') }}',
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
                                fetchAllMainMenuShow();
                            }
                            $("#main_menu_show_form")[0].reset();
                            $("#MainMenuShowModal").modal('hide');
                        }
                    });
                }
            });

            // edit main menu show ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('mainMenuShowEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#main_menu_show_name").val(response.main_menu_show_name);
                        $("#link").val(response.link);
                        $("#main_menu_show_id").val(response.id);
                    }
                });
            });

            // delete main menu show ajax request
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
                            url: '{{ route('mainMenuShowDelete') }}',
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
                                fetchAllMainMenuShow();
                            }
                        });
                    }
                })
            });

            // fetch all main menu show ajax request
            fetchAllMainMenuShow();

            function fetchAllMainMenuShow() {
                $.ajax({
                    url: '{{ route('mainMenuShowFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_main_menu_show").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
