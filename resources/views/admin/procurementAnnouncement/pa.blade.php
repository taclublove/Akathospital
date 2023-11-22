@extends('admin.dashboardAdmin')

@section('head')
    <title>การจัดการ ประกาศจัดซื้อจัดจ้าง</title>
@endsection

@section('modal')
    {{-- new employee modal Start --}}
    <div class="modal fade" id="add_PrecurementAnnouncement_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประกาศจัดซื้อจัดจ้าง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_precurement_announcement_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="title" class="form-label">ชื่อหัวข้อ</label>
                            <textarea type="text" class="form-control" name="title" id="title" rows="3"></textarea>
                          </div>
                        <label for="">ผู้บันทึกข้อมูล</label>
                        <select class="form-select my-2" aria-label="Disabled select example" disabled>
                            <option type="text" name="recorder" value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                        <div class="my-2">
                            <label for="filePdf">เพิ่มไฟล์ PDF</label>
                            <input type="file" name="filePdf" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิกรายการ</button>
                        <button type="submit" id="add_precurementAnnouncement_btn" class="btn btn-primary">เพิ่มรายการ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- new employee modal End --}}

    {{-- edit employee modal Start --}}
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"
                                required>
                        </div>
                        <div class="my-2">
                            <label for="avatar">Select Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="mt-2" id="avatar"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update
                            Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit employee modal End --}}
@endsection

@section('content')
    <div class="container" id="page-content">
        <div class=" row my-5">
            <div class="col-lg-12">
                <h1 class="text-center">ประกาศจัดซื้อจัดจ้าง</h1>
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">การจัดการ ประกาศจัดซื้อจัดจ้าง</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add_PrecurementAnnouncement_Modal">เพิ่มข้อมูล</button>
                    </div>
                    <div class="card-body" id="show_all_precurementAnnounment">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        $(function() {

            // add new precurement announments ajax request
            $("#add_precurement_announcement_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_precurementAnnouncement_btn").text('Adding...');
                $.ajax({
                    url: '{{ route('store') }}',
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
                                'Precurement Announments Added Successfully!',
                                'success'
                            )
                            fetchAllProcurementAnnouncement();
                        }
                        $("#add_precurementAnnouncement_btn").text('Add Employee');
                        $("#add_precurement_announcement_form")[0].reset();
                        $("#add_PrecurementAnnouncement_Modal").modal('hide');
                    }
                });
            });

            // edit precurement announcement ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#fname").val(response.first_name);
                        $("#lname").val(response.last_name);
                        $("#email").val(response.email);
                        $("#avatar").html(
                            `<img src="storage/images/${response.avatar}" width="100" class="img-fluid img-thumbnail">`
                        );
                        $("#emp_id").val(response.id);
                        $("#emp_avatar").val(response.avatar);
                    }
                });
            });

            // update employee ajax request
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_employee_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('update') }}',
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
                                'Employee Updated Successfully!',
                                'success'
                            )
                            fetchAllProcurementAnnouncement();
                        }
                        $("#edit_employee_btn").text('Update Employee');
                        $("#edit_employee_form")[0].reset();
                        $("#editEmployeeModal").modal('hide');
                    }
                });
            });

            // delete employee ajax request
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
                            url: '{{ route('delete') }}',
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
                                fetchAllProcurementAnnouncement();
                            }
                        });
                    }
                })
            });

            // fetch all employees ajax request
            fetchAllProcurementAnnouncement();

            function fetchAllProcurementAnnouncement() {
                $.ajax({
                    url: '{{ route('fetchAll') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_precurementAnnounment").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });
    </script> --}}
@endsection
