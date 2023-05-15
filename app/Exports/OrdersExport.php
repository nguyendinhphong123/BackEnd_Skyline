<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrdersExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        return DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select(
                'customers.name as cateName',
                'customers.phone as catephone',
                'orders.total',
                'orders.checkin',
                'orders.checkout'
            )->get();
    }
    public function headings(): array
    {
        return ["Tên Khách Hàng", "Điện Thoại",  "Tổng Tiền Đơn","Ngày Đặt","Ngày Trả"];
    }
}