<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;

class OrderController extends Controller
{
    public function index(){
        $totalPrice = Order::sum('total_price');
        $order =Order::orderBy('id', 'DESC')->get();
        return view('backend.order.index',compact('order','totalPrice'));
    }


    public function exportOrders()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    
    public function ChngeCancelling($id){
        $order = Order::find($id);
        $order->status = 'inactive';
        $order->save();
        return redirect()->back();
    }
}
