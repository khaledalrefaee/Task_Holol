@extends('backend.index')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categories"><i class="fa fa-plus"></i> Add Categories</a>
                    </div>
                </div>
            </div>
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Categore</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('admin.categories.update',$Cat->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>name Category</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name', $Cat->name) }}"  placeholder="Enter name clincs">
                        @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Go!</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
