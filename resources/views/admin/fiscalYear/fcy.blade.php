@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการข้อมูลปีงบประมาณ</title>
@endsection

@section('modal')
    {{-- new fiscal year start --}}
    <div class="modal fade" id="FiscalYearModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Fiscal Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearEditForm();"></button>
                </div>
                <form action="#" method="POST" class="form mt-3" id="fiscalYear_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="fiscalYear_id" class="fiscalYear_id" id="fiscalYear_id">
                    {{-- <input type="hidden" name="user_image" id="user_image"> --}}
                    <input type="hidden" name="mode" id="mode" value="">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ปีงบประมาณ') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('fiscalYear_name') is-invalid @enderror" name="fiscalYear_name"
                                id="fiscalYear_name" required autocomplete="fiscalYear_name" autofocus>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearEditForm();">Close</button>
                        <button type="submit" id="fiscalYear_btn" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  new fiscal year end --}}
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Fiscal Year</h3>
                        <button class="btn btn-light addIcon" data-bs-toggle="modal" data-bs-target="#FiscalYearModal"><i
                                class="bi-plus-circle me-2"></i>Add New Fiscal Year</button>
                    </div>
                    <div class="card-body" id="show_all_fiscalYear">
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
            $('#title').text('Add new fiscal year');
            $('#mode').attr('value', 'add');
            // $('#username').attr('readonly', false);
            // $('#image').empty();
            $("#fiscalYear_form")[0].reset();
        });

        $(document).on('click', '.editIcon', function() {
            $('#title').text('Update fiscal year');
            $('#mode').attr('value', 'edit');
            // $('#username').attr('readonly', true);
            // $('#password_confirm').hide();
        })

        function clearEditForm() {
            // $('#image').empty();
            $("#fiscalYear_form")[0].reset();
        }

        $(function() {

            // add new fiscal year ajax request
            $("#fiscalYear_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                const mode = $('#mode').val();
                if(mode === 'add') {
                    $.ajax({
                        url: '{{ route('fiscalYearStore') }}',
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
                                fetchAllFiscalYear();
                            }
                            // $("#fiscalYear_btn").text('Add Fiscal Year');
                            $("#fiscalYear_form")[0].reset();
                            $("#FiscalYearModal").modal('hide');
                        }
                    });
                } else if(mode === 'edit') {
                    $.ajax({
                        url: '{{ route('fiscalYearUpdate') }}',
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
                                fetchAllFiscalYear();
                            }
                            $("#fiscalYear_btn").text('Update Fiscal Year');
                            $("#fiscalYear_form")[0].reset();
                            $("#FiscalYearModal").modal('hide');
                        }
                    });
                }

            });

            // edit fiscal year ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('fiscalYearEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#fiscalYear_name").val(response.fiscalYear_name);
                        $("#fiscalYear_id").val(response.id);
                    }
                });
            });

            // delete fiscal year ajax request
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
                            url: '{{ route('fiscalYearDelete') }}',
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
                                fetchAllFiscalYear();
                            }
                        });
                    }
                })
            });

            // fetch all fiscal year ajax request
            fetchAllFiscalYear();

            function fetchAllFiscalYear() {
                $.ajax({
                    url: '{{ route('fiscalYearFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_fiscalYear").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
