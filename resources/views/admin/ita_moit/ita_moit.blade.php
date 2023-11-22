@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ITA MOIT</title>
@endsection

@section('modal')
    {{-- new user modal start --}}
    <div class="modal fade" id="ItaMainModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New ITA MOIT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="itaMain_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="itaMain_id" class="itaMain_id" id="itaMain_id">
                    {{-- <input type="hidden" name="user_image" id="user_image"> --}}
                    <input type="hidden" name="mode" id="mode" value="">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อหัวข้อหลัก') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name_ita_main') is-invalid @enderror" name="name_ita_main"
                                id="name_ita_main" required autocomplete="name_ita_main" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end">{{ __('ปีงบประมาณ') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('fiscalYear_id') is-invalid @enderror"
                                aria-label="Default select example" id="fiscalYear_id" name="fiscalYear_id">
                                <option selected autofocus>กรุณาเลือกสถานะผู้ใช้งาน</option>
                                @foreach ($fiscalYears as $fiscalYear)
                                    <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->fiscalYear_name }}</option>
                                @endforeach
                            </select>

                            @error('fiscalYear_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('คำอธิบาย') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('description_ita_main') is-invalid @enderror" name="description_ita_main"
                                id="description_ita_main" required autocomplete="description_ita_main" autofocus>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="itaMain_btn" class="btn btn-primary">บันทึก</button>
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
                        <h3 class="text-light">Manage Ita Main</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#ItaMainModal"><i
                                class="bi-plus-circle me-2"></i>Add New Ita Main</button>
                    </div>
                    <div class="card-body" id="show_all_itaMain">
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
            $('#title').text('Add new ita main');
            $('#mode').attr('value', 'add');
            $("#itaMain_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ita main');
            $('#mode').attr('value', 'edit');
        })

        function clearEditForm() {
            $("#itaMain_form")[0].reset();
        }

        $(function() {

            // add new user ajax request
            $("#itaMain_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    // $("#add_user_btn").text('Adding...');
                    $.ajax({
                        url: '{{ route('itaMainStore') }}',
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
                                fetchAllItaMain();
                            }
                            // $("#itaMain_btn").text('Add Ita Main');
                            $("#itaMain_form")[0].reset();
                            $("#ItaMainModal").modal('hide');
                        }
                    });
                    // console.log('add');
                } else if(mode === 'edit') {
                    // $("#edit_user_btn").text('Updating...');
                    $.ajax({
                        url: '{{ route('itaMainUpdate') }}',
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
                                fetchAllItaMain();
                            }
                            // $("#itaMain_btn").text('Update User');
                            $("#itaMain_form")[0].reset();
                            $("#ItaMainModal").modal('hide');
                        }
                    });
                }

            });

            // edit ita main ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('itaMainEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#name_ita_main").val(response.name_ita_main);
                        $("#fiscalYear_id").val(response.fiscalYear_id);
                        $("#description_ita_main").val(response.description_ita_main);
                        $("#itaMain_id").val(response.id);
                    }
                });
            });

            // delete ita main ajax request
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
                            url: '{{ route('itaMainDelete') }}',
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
                                fetchAllItaMain();
                            }
                        });
                    }
                })
            });

            // fetch all employees ajax request
            fetchAllItaMain();

            function fetchAllItaMain() {
                $.ajax({
                    url: '{{ route('itaMainFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_itaMain").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
