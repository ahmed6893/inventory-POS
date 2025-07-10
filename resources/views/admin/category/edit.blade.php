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
                        <h1 class="page-title">Edit Category</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                                    <h4 class="m-0">All Category</h4>
                                    <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold text-dark">Category Name</label>
                                                    <input type="text" name="category_name" class="form-control" required value="{{ $category->name }}">
                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold text-dark">Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
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
