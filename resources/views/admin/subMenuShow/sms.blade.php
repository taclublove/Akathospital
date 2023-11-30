@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ Sub Menu Show</title>
@endsection

@section('modal')
    {{-- new sub menu show start --}}
    <div class="modal fade" id="SubMenuShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Sub Menu Show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form mt-3" id="subMenuShow_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subMenuShow_id" class="subMenuShow_id" id="subMenuShow_id">
                    {{-- <input type="hidden" name="user_image" id="user_image"> --}}
                    <input type="hidden" name="mode" id="mode" value="">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ระบุหัวข้อ') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('main_menu_show') is-invalid @enderror"
                                aria-label="Default select example" id="main_menu_show_id" name="main_menu_show_id">
                                <option selected autofocus>เลือกหัวข้อ</option>
                                @foreach ($mainMenuShow as $mms)
                                    <option value="{{ $mms->id }}">{{ $mms->main_menu_show_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('เพิ่มปุ่มย่อย') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('sub_menu_show_name') is-invalid @enderror" name="sub_menu_show_name"
                                id="sub_menu_show_name" required autocomplete="sub_menu_show_name" autofocus>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="subMenuShow_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new sub menu show end --}}
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Sub Menu Show</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#SubMenuShowModal"><i
                                class="bi-plus-circle me-2"></i>Add New Sub Menu Show</button>
                    </div>
                    <div class="card-body" id="show_all_subMenuShow">
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
            $('#title').text('Add new sub menu show');
            $('#mode').attr('value', 'add');
            $("#subMenuShow_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update sub menu show');
            $('#mode').attr('value', 'edit');
        })

        function clearEditForm() {
            $("#subMenuShow_form")[0].reset();
        }

        $(function() {

            // add new sub menu show ajax request
            $("#subMenuShow_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('subMenuShowStore') }}',
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
                                fetchAllSubMenuShow();
                            }
                            $("#subMenuShow_form")[0].reset();
                            $("#SubMenuShowModal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('subMenuShowUpdate') }}',
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
                                fetchAllSubMenuShow();
                            }
                            $("#subMenuShow_form")[0].reset();
                            $("#SubMenuShowModal").modal('hide');
                        }
                    });
                }

            });

            // edit sub menu show ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('subMenuShowEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#sub_menu_show_name").val(response.sub_menu_show_name);
                        $("#main_menu_show_id").val(response.main_menu_show_id);
                        $("#subMenuShow_id").val(response.id);
                    }
                });
            });

            // delete sub menu show ajax request
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
                            url: '{{ route('subMenuShowDelete') }}',
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
                                fetchAllSubMenuShow();
                            }
                        });
                    }
                })
            });

            // fetch all fiscal year ajax request
            fetchAllSubMenuShow();

            function fetchAllSubMenuShow() {
                $.ajax({
                    url: '{{ route('subMenuShowFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_subMenuShow").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
