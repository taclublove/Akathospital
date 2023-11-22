@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการผู้เข้าใช้งานระบบ</title>
@endsection

@section('modal')
    {{-- new user modal start --}}
    <div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="user_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" class="user_id" id="user_id">
                    <input type="hidden" name="user_image" id="user_image">
                    <input type="hidden" name="mode" id="mode" value="">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('คำนำหน้า') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('prefix_id') is-invalid @enderror"
                                aria-label="Default select example" id="prefix_id" name="prefix_id">
                                <option selected autofocus>กรุณาเลือกคำนำหน้า</option>
                                @foreach ($prefixes as $prefix)
                                    <option value="{{ $prefix->id }}">{{ $prefix->prefix_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อจริง') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname"
                                id="fname" required autocomplete="fname" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                                id="lname" required autocomplete="lname" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                name="username" id="username" required autocomplete="username" onkeyup="eng_only();" autofocus>
                                <span id="username-error" class="help-block"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" required autocomplete="email">
                                <span id="email-error" class="help-block"></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end">{{ __('สถานะของผู้ใช้งาน') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('type_id') is-invalid @enderror"
                                aria-label="Default select example" id="type_id" name="type_id">
                                <option selected autofocus>กรุณาเลือกสถานะผู้ใช้งาน</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>

                            @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('เพศ') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('sex_id') is-invalid @enderror"
                                aria-label="Default select example" id="sex_id" name="sex_id">
                                <option selected autofocus>กรุณาเลือกเพศ</option>
                                @foreach ($sexes as $sex)
                                    <option value="{{ $sex->id }}">{{ $sex->sex_name }}</option>
                                @endforeach
                            </select>

                            @error('prefix_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('เลือกรูปภาพ') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="image">
                            <div id="image"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="user_btn" class="btn btn-primary user_btn">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new user modal end --}}
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Users</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#UserModal"><i
                                class="bi-plus-circle me-2"></i>Add New User</button>
                    </div>
                    <div class="card-body" id="show_all_user">
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
            $('#title').text('Add new user');
            $('#mode').attr('value', 'add');
            $('#username').attr('readonly', false);
            $('#image').empty();
            $("#user_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update user');
            $('#mode').attr('value', 'edit');
            $('#username').attr('readonly', true);
            $('#password_confirm').hide();
        })

        function clearEditForm() {
            $('#image').empty();
            $("#user_form")[0].reset();
        }

        $(function() {

            $(document).ready(function () {
                $('#username').on('blur', function () {
                    var username = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('userCheck') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'username': username
                        },
                        success: function (response) {
                            if(response.exists) {
                                $('#username-error').html('<strong>Username นี้ มีผู้ใช้งานแล้ว</strong>');
                            } else {
                                $('#username-error').html('');
                            }
                        }
                    });
                });
                $('#email').on('blur', function () {
                    var email = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('userCheck') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'email' : email
                        },
                        success: function (response) {
                            if(response.exists) {
                                $('#email-error').html('<strong>Email นี้ มีผู้ใช้งานแล้ว</strong>');
                            } else {
                                $('#email-error').html('');
                            }
                        }
                    });
                });
            });

            // add new user ajax request
            $("#user_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $("#add_user_btn").text('Adding...');
                    $.ajax({
                        url: '{{ route('userStore') }}',
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
                                fetchAllUser();
                            }
                            $("#add_user_btn").text('Add User');
                            $("#user_form")[0].reset();
                            $("#UserModal").modal('hide');
                        }
                    });
                    // console.log('add');
                } else if(mode === 'edit') {
                    $("#edit_user_btn").text('Updating...');
                    $.ajax({
                        url: '{{ route('userUpdate') }}',
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
                                fetchAllUser();
                            }
                            $("#edit_user_btn").text('Update User');
                            $("#user_form")[0].reset();
                            $("#UserModal").modal('hide');
                        }
                    });
                    // console.log('edit');
                }

            });

            // edit user ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('userEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#prefix_id").val(response.prefix_id);
                        $("#fname").val(response.fname);
                        $("#lname").val(response.lname);
                        $("#username").val(response.username);
                        $("#email").val(response.email);
                        $("#type_id").val(response.type_id);
                        $("#sex_id").val(response.sex_id);
                        $("#image").html(
                            `<img src="storage/images/users/${response.image}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#user_id").val(response.id);
                        $("#user_image").val(response.image);
                    }
                });
            });

            // delete user ajax request
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
                            url: '{{ route('userDelete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                //image: image,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    response.title,
                                    response.message,
                                    response.icon
                                )
                                fetchAllUser();
                            }
                        });
                    }
                })
            });

            // fetch all employees ajax request
            fetchAllUser();

            function fetchAllUser() {
                $.ajax({
                    url: '{{ route('userFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_user").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
