@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ITA Sub 1</title>
@endsection

@section('modal')
    {{-- new user ita sub 1 start --}}
    <div class="modal fade" id="ItaSub1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Ita Sub 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="itaSub1_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="itaSub1_id" class="itaSub1_id" id="itaSub1_id">
                    <input type="hidden" name="itaSub1_file" id="itaSub1_file">
                    <input type="hidden" name="mode" id="mode" value="">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ItaMain') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('itaMain_id') is-invalid @enderror"
                                aria-label="Default select example" id="itaMain_id" name="itaMain_id">
                                <option selected autofocus>เลือก Ita Main</option>
                                @foreach ($itaMains as $itaMain)
                                    <option value="{{ $itaMain->id }}">{{ $itaMain->name_ita_main }} : {{ $itaMain->fiscalYear->fiscalYear_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ita Sub Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('ita_sub_name') is-invalid @enderror" name="ita_sub_name"
                                id="ita_sub_name" required autocomplete="ita_sub_name" autofocus>

                            @error('ita_sub_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('เลือก File') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="file">
                            <div id="file"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="itaSub_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new ita sub 1 modal end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Ita Sub 1</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#ItaSub1Modal"><i
                                class="bi-plus-circle me-2"></i>Add New Ita Sub 1</button>
                    </div>
                    <div class="card-body" id="show_all_itaSub1">
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
            $('#title').text('Add new ita sub 1');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#itaSub1_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ita sub 1');
            $('#mode').attr('value', 'edit');
        })

        function clearEditForm() {
            $('#file').empty();
            $("#itaSub1_form")[0].reset();
        }

        $(function() {

            // add new ita sub 1 ajax request
            $("#itaSub1_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('itaSub1Store') }}',
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
                                fetchAllItaSub1();
                            }
                            $("#itaSub1_form")[0].reset();
                            $("#ItaSub1Modal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('itaSub1Update') }}',
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
                                fetchAllItaSub1();
                            }
                            $("#itaSub1_form")[0].reset();
                            $("#ItaSub1Modal").modal('hide');
                        }
                    });
                }
            });

            // edit ita sub 1 ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('itaSub1Edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#itaMain_id").val(response.itaMain_id);
                        $("#ita_sub_name").val(response.ita_sub_name);
                        $("#file").html(
                            `<img src="storage/files/ita/66/itaSub1/${response.file}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#itaSub1_id").val(response.id);
                        $("#itaSub1_file").val(response.file);
                    }
                });
            });

            // delete ita sub 1 ajax request
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
                            url: '{{ route('itaSub1Delete') }}',
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
                                fetchAllItaSub1();
                            }
                        });
                    }
                })
            });

            // fetch all ita sub 1 ajax request
            fetchAllItaSub1();

            function fetchAllItaSub1() {
                $.ajax({
                    url: '{{ route('itaSub1FetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_itaSub1").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
