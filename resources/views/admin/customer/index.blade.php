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
                        <h1 class="page-title">Customer</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!--ROW OPENED-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="card-header border-bottom d-flex justify-content-between">
                                    <h3 class="card-title">All Customer Info</h3>
                                    <a href="{{route('customer.create')}}" class="btn btn-primary">Add Customer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('delete') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body project-list-table-container">
                                <div class="table-responsive">
                                    <table id="project-table" class="table text-nowrap mb-0 table-bordered border-top border-bottom project-list-main">
                                        <thead class="table-head">
                                        <tr>
                                            <th class="bg-transparent border-bottom-0 text-center w-5">S.no</th>
                                            <th class="bg-transparent border-bottom-0">Image</th>
                                            <th class="bg-transparent border-bottom-0">Customer Name</th>
                                            <th class="bg-transparent border-bottom-0">Customer Phone</th>
                                            <th class="bg-transparent border-bottom-0">Customer Email</th>
                                            <th class="bg-transparent border-bottom-0">Customer </th>
                                            <th class="bg-transparent border-bottom-0">Address</th>
                                            <th class="bg-transparent border-bottom-0 no-btn">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-body">
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td class="text-muted fs-15 fw-semibold text-center">{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{asset($customer->customer_image)}}" alt="Image" width="50" height="50">
                                            </td>
                                            <td>
                                                <h6 class="mb-0 fs-14 fw-semibold">{{$customer->name}}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 fs-14 fw-semibold">{{$customer->phone}}</h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 fs-14 fw-semibold">{{$customer->address}}</h6>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-stretch">
                                                    <a class="btn btn-sm btn-outline-success border me-2" href="{{route('customer.edit',$customer->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-success border me-2" href="{{route('customer.view',$customer->id)}}" data-bs-toggle="tooltip" data-bs-original-title="View">
                                                        <i class="fe fe-eye"></i>
                                                    </a>
                                                    <form action="{{route('customer.destroy',$customer->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary border me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete" onclick="return confirm('Are You Sure ..')">
                                                            <i class="fe fe-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>
                <!--ROW CLOSED-->


            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
