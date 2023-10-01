@extends('backend.index')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">order</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                        <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                        <div class="dash-widget-info">
                        <h3>{{\App\Models\Order::count()}}</h3>
                        <span>total price {{$totalPrice}}</span>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                        <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                        <h3>{{\App\Models\wish_lists::count()}}</h3>
                        <span>wish lists</span>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                         <div class="card dash-widget">
                        <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                        <h3>{{\App\Models\User::count()}}</h3>
                        <span>Users</span>
                        </div>
                        </div>
                        </div>
                        </div>
                       
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('export.orders') }}" class="btn btn-success">Export Orders to Excel</a>

                    </div>
                </div>
            </div>
            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0" id="myTable">
                            <thead>
                            <tr>
                                <th>order number</th>
                                <th>order Name </th>
                                <th>order address </th>
                                <th>total_price </th>
                                 <th>status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($order as $item)
                                <td>{{$item->order_number}}</td>
                            
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->total_price}}</td>
                                <td >
                                    <div class="dropdown action-label">
                                        <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            @if($item->status == 'pending')
                                                <i class="fa fa-dot-circle-o text-success"></i> pending
                                            @elseif($item->status == 'inactive')
                                                <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                           @endif
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> pending</a>
                                            <a class="dropdown-item" href="{{route('Change.Status',$item->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                        </div>
                                    </div>
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
    @endsection
