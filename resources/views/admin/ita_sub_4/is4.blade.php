@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ITA Sub 4</title>
@endsection

@section('modal')
    {{-- new user ita sub 4 start --}}
    <div class="modal fade" id="ItaSub4Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Ita Sub 4</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form" id="itaSub4_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="itaSub4_id" class="itaSub4_id" id="itaSub4_id">
                    <input type="hidden" name="itaSub4_file" id="itaSub4_file">
                    <input type="hidden" name="mode" id="mode" value="">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ItaSub3') }}</label>

                        <div class="col-md-6">
                            <select class="form-select @error('itaMain_id') is-invalid @enderror"
                                aria-label="Default select example" id="itaSub3_id" name="itaSub3_id">
                                <option selected autofocus>เลือก Ita Sub 3</option>
                                @foreach ($itaSub3 as $itaSub)
                                    <option value="{{ $itaSub->id }}">{{ $itaSub->itaSub2->itaSub2_name }} : {{ $itaSub->itaSub3_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ita Sub 4 Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control @error('itaSub4_name') is-invalid @enderror" name="itaSub4_name"
                                id="itaSub4_name" required autocomplete="itaSub4_name" autofocus>

                            @error('itaSub4_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3" style="margin-left: 10rem;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">เพิ่ม File</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">เพิ่ม Link</label>
                        </div>
                    </div>

                    <div class="row mb-3" id="showInputFile">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('เลือก File') }}</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="file">
                            <input id="file" class="mt-2">
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
                        <button type="submit" id="itaSub4_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new ita sub 4 modal end --}}
@endsection

@section('content')
    <div class="container h-100">
        <div class="row pb-5" style="margin-top: 3rem;">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Ita Sub 4</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#ItaSub4Modal"><i
                                class="bi-plus-circle me-2"></i>Add New Ita Sub 4</button>
                    </div>
                    <div class="card-body" id="show_all_itaSub4">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            truncateSelectOptions('itaSub3_id');
        });

        function truncateSelectOptions(selectId) {
            var select = document.getElementById(selectId);

            if (select) {
                var options = select.options;

                for (var i = 0; i < options.length; i++) {
                    var optionText = options[i].text;
                    var maxLength = 20; // กำหนดความยาวที่ต้องการ

                    if (optionText.length > maxLength) {
                        options[i].text = optionText.substring(0, maxLength) + '...';
                    }
                    if (optionText.length > maxLength) {
                        options[i].text = optionText.substring(0, maxLength) + '...';
                    }
                }
            }
        }

        $('.addIcon').on('click', function() {
            $('#title').text('Add new ita sub 4');
            $('#mode').attr('value', 'add');
            $('#file').empty();
            $("#itaSub4_form")[0].reset();
            $('#showInputFile').hide();
            $('#showInputLink').hide();
            $('#file').hide();
            $('#inlineRadio1').on('click', function() {
                $('#showInputFile').show();
                $('#showInputLink').hide();
            });
            $('#inlineRadio2').on('click', function() {
                $('#showInputFile').hide();
                $('#showInputLink').show();
            });
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update ita sub 4');
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
            $("#itaSub4_form")[0].reset();
        }

        $(function() {

            // add new ita sub 4 ajax request
            $("#itaSub4_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('itaSub4Store') }}',
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
                                fetchAllItaSub4();
                            }
                            $("#itaSub4_form")[0].reset();
                            $("#ItaSub4Modal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('itaSub4Update') }}',
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
                                fetchAllItaSub4();
                            }
                            $("#itaSub4_form")[0].reset();
                            $("#ItaSub4Modal").modal('hide');
                        }
                    });
                }
            });

            // edit ita sub 4 ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('itaSub4Edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#itaSub3_id").val(response.itaSub3_id);
                        $("#itaSub4_name").val(response.itaSub4_name);
                        $("#link").val(response.link);
                        $("#file").val(response.file);
                        // $("#file").html(
                        //     `<img src="storage/files/ita/66/itaSub4/${response.file}" width="100" class="img-fluid img-thumbnail">`
                        // );
                        $("#itaSub4_id").val(response.id);
                        $("#itaSub4_file").val(response.file);
                    }
                });
            });

            // delete ita sub 4 ajax request
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
                            url: '{{ route('itaSub4Delete') }}',
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
                                fetchAllItaSub4();
                            }
                        });
                    }
                })
            });

            // fetch all ita sub 4 ajax request
            fetchAllItaSub4();

            function fetchAllItaSub4() {
                $.ajax({
                    url: '{{ route('itaSub4FetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_itaSub4").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
