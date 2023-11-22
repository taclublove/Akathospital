@extends('admin.dashboardAdmin')

@section('head')
    <title>Laravel 10 CRUD With Image Upload using jQuery Ajax with SweetAlert and DataTables</title>
@endsection

@section('content')
    <div class="container" id="page-content">
        <div class=" row my-5">
            <div class="col-lg-12">
                <h1 class="">Dashboard Admin</h1>
                {{-- <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">Manage Employees</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add
                            New
                            Employee</button>
                    </div>
                    <div class="card-body" id="show_all_employees">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
