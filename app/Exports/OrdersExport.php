<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Order;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    
    public function headings(): array
    {
        return [
            'Order Number',
            'Customer Name',
            'Total Amount',
        ];
    }
}
