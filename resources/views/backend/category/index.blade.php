@extends('backend.index')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_categories"><i class="fa fa-plus"></i> Add Categories</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name </th>

                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($Categories as $item)
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-outline-warning"><a href="{{route('admin.categories.edit',$item -> id)}}">Edit</a></button>
                                    <button type="button" class="btn btn-outline-danger"><a href="{{route('admin.categories.delete',$item->id)}}">Delete</a></button>


                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@include('backend.category.create')




@endsection



