@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ การเพิ่มสถานะผู้ใช้งาน</title>
@endsection

@section('modal')
    {{-- new Type modal Start --}}
    <div class="modal fade" id="add_type_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_type_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="type_name" class="form-label">เพิ่มตัวเลือกสถานะ</label>
                            <input type="text" class="form-control" name="type_name" required placeholder="ระบุสถานะ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิกรายการ</button>
                        <button type="submit" id="add_type_btn" class="btn btn-primary">เพิ่มรายการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- new Type modal End --}}

    {{-- edit Type modal Start --}}
    <div class="modal fade" id="editTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการสถานะ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_type_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type_id" id="type_id">
                    {{-- <input type="hidden" name="sex_avatar" id="sex_avatar"> --}}
                    <div class="modal-body p-4 bg-light">
                            <div class="col-lg">
                                <label for="type_name">เพิ่มตัวเลือกสถานะ</label>
                                <input type="text" name="type_name" id="type_name" class="form-control"
                                    placeholder="สถานะ" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_type_btn" class="btn btn-success">Update รายการสถานะ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit Type modal End --}}
@endsection

@section('content')
    <div class="container" id="page-content">
        <div class=" row my-5">
            <div class="col-lg-12">
                <h1 class="text-center">เพิ่มข้อมูลสถานะ</h1>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">การจัดการข้อมูลสถานะ</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add_type_Modal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body" id="show_all_type">
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

            // add new Type ajax request
            $("#add_type_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_type_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('typeStore') }}',
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
                                'Type Added Successfully!',
                                'success'
                            )
                            fetchAllType();
                        }
                        $("#add_type_btn").text('Add Type');
                        $("#add_type_form")[0].reset();
                        $("#add_type_Modal").modal('hide');
                    }
                });
            });

            // edit Type ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('typeEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#type_name").val(response.type_name);
                        $("#type_id").val(response.id);
                        // $("#sex_avatar").val(response.avatar);
                    }
                });
            });

            // update Type ajax request
            $("#edit_type_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_type_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('typeUpdate') }}',
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
                                'Type Updated Successfully!',
                                'success'
                            )
                            fetchAllType();
                        }
                        $("#edit_type_btn").text('Update Type');
                        $("#edit_type_form")[0].reset();
                        $("#editTypeModal").modal('hide');
                    }
                });
            });

            // delete Type ajax request
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
                            url: '{{ route('typeDelete') }}',
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
                                fetchAllType();
                            }
                        });
                    }
                })
            });

            // fetch all Type ajax request
            fetchAllType();

            function fetchAllType() {
                $.ajax({
                    url: '{{ route('typeFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_type").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
