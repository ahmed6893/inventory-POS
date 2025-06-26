@extends('admin.master')
@section('body')
       <!--app-content open-->
       <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Employee Details</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Show Employee</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!--ROW OPENED-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div  class="card">
                            <div class="card-body p-5 create-project-main">

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="m-0">Employee {{ $employee->name }}</h4>
                                    <a href="{{ route('employer') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold text-dark">Employee Name</label>
                                        <p class="form-control">{{ $employee->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Employee phone</label>
                                        <p class="form-control">{{ $employee->phone }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Employee Email</label>
                                        <p class="form-control">{{ $employee->email }}</p>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Address</label>
                                        <p class="form-control">{{ $employee->address }}</p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Vacation</label>
                                        <p class="form-control">{{ $employee->vacation }}</p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Experiance</label>
                                        <p class="form-control">{{ $employee->experiance }}</p>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label class="form-label text-muted">Employee Salary:</label>
                                    <div class="input-group">
                                        <p class="form-control">{{ $employee->salary }}</p>
                                    </div>
                                </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label for="employee-status" class="form-label text-muted">Status:</label>
                                                <p class="form-control">{{ $employee->status == 1 ? 'Active' : 'Inactive' }}</p>
                                            </div>
                                        </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Employee Image:</label>
                                            <img src="{{ asset($employee->employee_image) }}" alt="Employee Image" class="mt-2" width="100">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ROW CLOSED-->
            </div>
        </div>
    </div>
        <!-- CONTAINER CLOSED -->
 </div>
@endsection
