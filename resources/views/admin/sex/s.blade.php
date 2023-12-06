@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ การเพิ่มเพศผู้ใช้งาน</title>
@endsection

@section('modal')
    {{-- new Sex modal Start --}}
    <div class="modal fade" id="add_sex_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลเพศ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_sex_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="sex_name" class="form-label">เพิ่มตัวเลือกเพศ</label>
                            <input type="text" class="form-control" name="sex_name" required placeholder="ระบุเพศ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิกรายการ</button>
                        <button type="submit" id="add_sex_btn" class="btn btn-primary">เพิ่มรายการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- new Sex modal End --}}

    {{-- edit Sex modal Start --}}
    <div class="modal fade" id="editSexModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการเพศ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_sex_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="sex_id" id="sex_id">
                    {{-- <input type="hidden" name="sex_avatar" id="sex_avatar"> --}}
                    <div class="modal-body p-4 bg-light">
                            <div class="col-lg">
                                <label for="sex_name">เพิ่มตัวเลือกเพศ</label>
                                <input type="text" name="sex_name" id="sex_name" class="form-control"
                                    placeholder="เพศ" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_sex_btn" class="btn btn-success">Update รายการเพศ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit Sex modal End --}}
@endsection

@section('content')
    <div class="container" id="page-content">
        <div class=" row my-5">
            <div class="col-lg-12">
                <h1 class="text-center">เพิ่มข้อมูลเพศ</h1>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">การจัดการ ข้อมูลเพศ</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add_sex_Modal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body" id="show_all_sex">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            // add new Sex ajax request
            $("#add_sex_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_sex_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('sexStore') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Added!',
                                'Sex Added Successfully!',
                                'success'
                            )
                            fetchAllSex();
                        }
                        $("#add_sex_btn").text('Add Sex');
                        $("#add_sex_form")[0].reset();
                        $("#add_sex_Modal").modal('hide');
                    }
                });
            });

            // edit Sex ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('sexEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#sex_name").val(response.sex_name);
                        $("#sex_id").val(response.id);
                        // $("#sex_avatar").val(response.avatar);
                    }
                });
            });

            // update Sex ajax request
            $("#edit_sex_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_sex_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('sexUpdate') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Updated!',
                                'Sex Updated Successfully!',
                                'success'
                            )
                            fetchAllSex();
                        }
                        $("#edit_sex_btn").text('Update Sex');
                        $("#edit_sex_form")[0].reset();
                        $("#editSexModal").modal('hide');
                    }
                });
            });

            // delete Sex ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('sexDelete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                fetchAllSex();
                            }
                        });
                    }
                })
            });

            // fetch all Sex ajax request
            fetchAllSex();

            function fetchAllSex() {
                $.ajax({
                    url: '{{ route('sexFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_sex").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
