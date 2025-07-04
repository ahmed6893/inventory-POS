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
                        <h1 class="page-title">Create Employee</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!--ROW OPENED-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div  class="card">
                            <div class="card-body p-5 create-project-main">

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="m-0">All Employee</h4>
                                    <a href="{{ route('employer') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <form action="{{route('employer.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold text-dark">Employee Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Employee name" value="{{ $employee->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Employee phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Employee phone" value="{{ $employee->phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Employee Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Employee email" value="{{ $employee->email }}">
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Address</label>
                                        <textarea  name="address" type="text" class="form-control text-dark" placeholder="Enter Address">{{ $employee->address }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Vacation</label>
                                        <textarea  name="vacation" type="text" class="form-control text-dark" placeholder="Enter Vacation">{{ $employee->vacation }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Experiance</label>
                                        <textarea  name="experiance" type="text" class="form-control text-dark" placeholder="Enter Experiance">{{ $employee->experiance }}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label class="form-label text-muted">Employee Salary:</label>
                                    <div class="input-group">
                                        <input  name="salary" type="number" class="form-control text-dark" placeholder="Employee Salary" value="{{ $employee->salary }}">
                                    </div>
                                </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label for="employee-status" class="form-label text-muted">Status:</label>
                                                <select name="status" id="employee-status" class="form-control">
                                                    <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Add Image:</label>
                                        <input type="file" class="dropify" data-bs-height="100" name="employee_image" />
                                            <img src="{{ asset($employee->employee_image) }}" alt="Employee Image" class="mt-2" width="100">
                                    </div>
                                </div>

                                  <!-- Buttons -->
                                  <div class="text-end">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fe fe-check-circle"></i> Update
                                    </button>
                                </div>
                            </div>
                                </form>
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
