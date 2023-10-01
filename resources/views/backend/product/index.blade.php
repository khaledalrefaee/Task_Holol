@extends('backend.index')
@section('content')



    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{route('admin.product.card')}}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                            <a href="{{route('admin.product')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body d-flex justify-content-between">
                <form action="{{ route('Filter_Category') }}" method="POST">
                    {{ csrf_field() }}
                    <select class="selectpicker form-control" data-style="btn-info" name="category_id" required onchange="this.form.submit()">
                        <option value="" selected disabled>Search By Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>qty</th>
                                <th>price</th>
                                <th>description</th>

                                <th class="text-nowrap">created_at</th>

                                <th class="text-right no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if (isset($details))
                                    <?php $Products = $details; ?>
                            @else
                                    <?php   $Products = $Products; ?>
                            @endif

                            <tr>
                                @foreach($Products as $item)
                                <td>
                                    <h2 class="table-avatar">
                                        @if(isset($item->images[0]))
                                            <a href="#" class="avatar">
                                                <img alt="" src="{{ asset('back/assets/imag/product/' . $item->images[0]->filename) }}">
                                            </a>
                                        @endif
                                        <a href="#">{{$item->name}} <span></span></a>
                                    </h2>
                                </td>
                                 <td>{{$item->cat->name}}</td>
                                <td>{{$item->qty}}</td>

                                <td>{{$item->selling_price}}</td>
                                <td>{{$item->description}}</td>


                                    <td>{{$item->created_at}}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-outline-warning"><a href="{{route('admin.product.edit',$item -> id)}}">Edit</a></button>
                                    <button type="button" class="btn btn-outline-danger"><a href="{{route('admin.product.delete',$item->id)}}">Delete</a></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


@include('backend.product.create')



    </div>
@endsection
