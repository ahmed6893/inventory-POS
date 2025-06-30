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
                        <h1 class="page-title">Edit Customer</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
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
                                    <h4 class="m-0">All Customer</h4>
                                    <a href="{{ route('customer.index') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <form action="{{route('customer.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold text-dark">Customer Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Customer name" value="{{ $customer->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Customer phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Customer phone" value="{{ $customer->phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Customer Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Customer email" value="{{ $customer->email }}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Account Holder</label>
                                        <input type="text" name="code" class="form-control" placeholder="Account holder" value="{{ $customer->account_holder }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Account No</label>
                                        <input type="text" name="type" class="form-control" placeholder="Account Number" value="{{ $customer->account_number }}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" value="{{ $customer->bank_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code" class="form-label fw-semibold text-dark">Bank Branch</label>
                                        <input type="text" name="bank_branch" class="form-control" placeholder="Bank Branch" value="{{ $customer->bank_branch }}">
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
                                        <label class="form-label text-muted">Add Image:</label>
                                        <input type="file" class="dropify" data-bs-height="100" name="customer_image" />
                                            <img src="{{ asset($customer->customer_image) }}" alt="Customer Image" class="mt-2" width="100">
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
