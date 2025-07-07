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
                        <h1 class="page-title">Create Salary For Employer</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Salary</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Salary</li>
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
                                    <h4 class="m-0">All Employer Salary</h4>
                                    <a href="{{ route('salary.index') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <form action="{{ route('salary.store') }}" method="POST">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Select Employee</label>
                                            <select name="employee_id" class="form-control" required>
                                                <option value="">-- Select Employee --</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }} ({{ $employee->phone }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Amount</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Salary Amount" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Month</label>
                                            <input type="month" name="month" class="form-control" placeholder="Month" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Payment Date</label>
                                            <input type="date" name="payment_date" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Payment Method</label>
                                            <input type="text" name="payment_method" class="form-control" placeholder="e.g. Cash, Bank" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1">Paid</option>
                                                <option value="0">Pending</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-dark">Notes</label>
                                            <input type="text" name="notes" class="form-control" placeholder="Optional">
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fe fe-check-circle"></i> Save
                                        </button>
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
