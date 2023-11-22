@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ITA Sub 2</title>
@endsection

@section('modal')
    {{-- new user ita sub 2 start --}}
    <div class="modal fade" id="ItaSub2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Ita Sub 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="itaSub2_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="itaSub2_id" class="itaSub2_id" id="itaSub2_id">
                    <input type="hidden" name="itaSub2_file" id="itaSub2_file">
                    <input type="hidden" name="mode" id="mode" value="">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ItaSub1') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('itaMain_id') is-invalid @enderror"
                                aria-label="Default select example" id="itaSub1_id" name="itaSub1_id">
                                <option selected autofocus>เลือก Ita Sub 1</option>
                                @foreach ($itaSub1 as $itaSub)
                                    <option value="{{ $itaSub->id }}">{{ $itaSub->itaMain->name_ita_main }} : {{ $itaSub->ita_sub_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ita Sub 2 Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('itaSub2_name') is-invalid @enderror" name="itaSub2_name"
                                id="itaSub2_name" required autocomplete="itaSub2_name" autofocus>

                            @error('itaSub2_name')
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
                        <button type="submit" id="itaSub2_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new ita sub 2 modal end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Ita Sub 2</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#ItaSub2Modal"><i
                                class="bi-plus-circle me-2"></i>Add New Ita Sub 2</button>
                    </div>
                    <div class="card-body" id="show_all_itaSub2">
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
            $('#title').text('Add new ita sub 2');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#itaSub2_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ita sub 2');
            $('#mode').attr('value', 'edit');
        })

        function clearEditForm() {
            $('#file').empty();
            $("#itaSub2_form")[0].reset();
        }

        $(function() {

            // add new ita sub 2 ajax request
            $("#itaSub2_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('itaSub2Store') }}',
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
                                fetchAllItaSub2();
                            }
                            $("#itaSub2_form")[0].reset();
                            $("#ItaSub2Modal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('itaSub2Update') }}',
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
                                fetchAllItaSub2();
                            }
                            $("#itaSub2_form")[0].reset();
                            $("#ItaSub2Modal").modal('hide');
                        }
                    });
                }
            });

            // edit ita sub 2 ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('itaSub2Edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#itaSub1_id").val(response.itaSub1_id);
                        $("#itaSub2_name").val(response.itaSub2_name);
                        $("#file").html(
                            `<img src="storage/files/ita/66/itaSub2/${response.file}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#itaSub2_id").val(response.id);
                        $("#itaSub2_file").val(response.file);
                    }
                });
            });

            // delete ita sub 2 ajax request
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
                            url: '{{ route('itaSub2Delete') }}',
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
                                fetchAllItaSub2();
                            }
                        });
                    }
                })
            });

            // fetch all ita sub 2 ajax request
            fetchAllItaSub2();

            function fetchAllItaSub2() {
                $.ajax({
                    url: '{{ route('itaSub2FetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_itaSub2").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
