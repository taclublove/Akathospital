@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ การเพิ่มคำนำหน้า</title>
@endsection

@section('modal')
    {{-- new Prefix modal Start --}}
    <div class="modal fade" id="add_prefix_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคำนำหน้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_prefix_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="prefix_name" class="form-label">เพิ่มตัวเลือกคำนำหน้า</label>
                            <input type="text" class="form-control" name="prefix_name" required placeholder="ระบุคำนำหน้า">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิกรายการ</button>
                        <button type="submit" id="add_prefix_btn" class="btn btn-primary">เพิ่มรายการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- new Prefix modal End --}}

    {{-- edit Prefix modal Start --}}
    <div class="modal fade" id="editPrefixModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขรายการคำนำหน้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_prefix_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="prefix_id" id="prefix_id">
                    {{-- <input type="hidden" name="sex_avatar" id="sex_avatar"> --}}
                    <div class="modal-body p-4 bg-light">
                            <div class="col-lg">
                                <label for="prefix_name">เพิ่มตัวเลือกคำนำหน้า</label>
                                <input type="text" name="prefix_name" id="prefix_name" class="form-control"
                                    placeholder="คำนำหน้า" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_prefix_btn" class="btn btn-success">Update รายการคำนำหน้า</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit Prefix modal End --}}
@endsection

@section('content')
    <div class="container" id="page-content">
        <div class=" row my-5">
            <div class="col-lg-12">
                <h1 class="text-center">เพิ่มข้อมูลคำนำหน้า</h1>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">การจัดการ ข้อมูลคำนำหน้า</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add_prefix_Modal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body" id="show_all_prefix">
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

            // add new Prefix ajax request
            $("#add_prefix_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_prefix_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('prefixStore') }}',
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
                                'Prefix Added Successfully!',
                                'success'
                            )
                            fetchAllPrefix();
                        }
                        $("#add_prefix_btn").text('Add Prefix');
                        $("#add_prefix_form")[0].reset();
                        $("#add_prefix_Modal").modal('hide');
                    }
                });
            });

            // edit Prefix ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('prefixEdit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#prefix_name").val(response.prefix_name);
                        $("#prefix_id").val(response.id);
                        // $("#sex_avatar").val(response.avatar);
                    }
                });
            });

            // update Prefix ajax request
            $("#edit_prefix_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_prefix_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('prefixUpdate') }}',
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
                                'Prefix Updated Successfully!',
                                'success'
                            )
                            fetchAllPrefix();
                        }
                        $("#edit_prefix_btn").text('Update Prefix');
                        $("#edit_prefix_form")[0].reset();
                        $("#editPrefixModal").modal('hide');
                    }
                });
            });

            // delete Prefix ajax request
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
                            url: '{{ route('prefixDelete') }}',
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
                                fetchAllPrefix();
                            }
                        });
                    }
                })
            });

            // fetch all Prefix ajax request
            fetchAllPrefix();

            function fetchAllPrefix() {
                $.ajax({
                    url: '{{ route('prefixFetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_prefix").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script>
@endsection
