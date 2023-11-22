@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ITA Sub 3</title>
@endsection

@section('modal')
    {{-- new user ita sub 3 start --}}
    <div class="modal fade" id="ItaSub3Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Ita Sub 3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="itaSub3_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="itaSub3_id" class="itaSub3_id" id="itaSub3_id">
                    <input type="hidden" name="itaSub3_file" id="itaSub3_file">
                    <input type="hidden" name="mode" id="mode" value="">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ItaSub2') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('itaMain_id') is-invalid @enderror"
                                aria-label="Default select example" id="itaSub2_id" name="itaSub2_id">
                                <option selected autofocus>เลือก Ita Sub 2</option>
                                @foreach ($itaSub2 as $itaSub)
                                    <option value="{{ $itaSub->id }}">{{ $itaSub->itaSub1->ita_sub_name }} : {{ $itaSub->itaSub2_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ita Sub 3 Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('itaSub3_name') is-invalid @enderror" name="itaSub3_name"
                                id="itaSub3_name" required autocomplete="itaSub3_name" autofocus>

                            @error('itaSub3_name')
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
                        <button type="submit" id="itaSub3_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new ita sub 3 modal end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Ita Sub 3</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#ItaSub3Modal"><i
                                class="bi-plus-circle me-2"></i>Add New Ita Sub 3</button>
                    </div>
                    <div class="card-body" id="show_all_itaSub3">
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
            $('#title').text('Add new ita sub 3');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#itaSub3_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ita sub 3');
            $('#mode').attr('value', 'edit');
        })

        function clearEditForm() {
            $('#file').empty();
            $("#itaSub3_form")[0].reset();
        }

        $(function() {

            // add new ita sub 3 ajax request
            $("#itaSub3_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('itaSub3Store') }}',
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
                                fetchAllItaSub3();
                            }
                            $("#itaSub3_form")[0].reset();
                            $("#ItaSub3Modal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('itaSub3Update') }}',
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
                                fetchAllItaSub3();
                            }
                            $("#itaSub3_form")[0].reset();
                            $("#ItaSub3Modal").modal('hide');
                        }
                    });
                }
            });

            // edit ita sub 3 ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('itaSub3Edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#itaSub2_id").val(response.itaSub2_id);
                        $("#itaSub3_name").val(response.itaSub3_name);
                        $("#file").html(
                            `<img src="storage/files/ita/66/itaSub3/${response.file}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#itaSub3_id").val(response.id);
                        $("#itaSub3_file").val(response.file);
                    }
                });
            });

            // delete ita sub 3 ajax request
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
                            url: '{{ route('itaSub3Delete') }}',
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
                                fetchAllItaSub3();
                            }
                        });
                    }
                })
            });

            // fetch all ita sub 3 ajax request
            fetchAllItaSub3();

            function fetchAllItaSub3() {
                $.ajax({
                    url: '{{ route('itaSub3FetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_itaSub3").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
