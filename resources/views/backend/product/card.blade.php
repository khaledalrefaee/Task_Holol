
@extends('backend.index')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-lists-center">
                <div class="col">
                    <h3 class="page-title">Product</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Product</a>
                    <div class="view-icons">
                        <a href="{{route('admin.product.card')}}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="{{route('admin.product')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->

        <!-- Search Filter -->
        {{-- message --}}
        <div class="row staff-grid-row">
            @foreach ($Products as $lists )
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="" class="avatar"><img src="{{ asset('back/assets/imag/product/' . $lists->images[0]->filename) }}" ></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('admin.product.edit',$lists -> id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="{{route('admin.product.delete',$lists -> id)}}"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $lists->name }}</a></h4>
                        <div class="small text-muted">{{ $lists->cat->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Employee Modal -->
    <!-- /Add Employee Modal -->
@include('backend.product.create')
</div>
@endsection
