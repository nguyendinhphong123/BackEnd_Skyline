<?php

namespace App\Exports;

use App\Models\Room;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RoomsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('rooms')
            ->join('categories', 'rooms.category_id', '=', 'categories.id')
            ->select(
                'rooms.name',
                'rooms.price',
                'rooms.status',
                'categories.name as cateName',
                'rooms.created_at',
                'rooms.updated_at',
            )->get();
    }
    public function headings(): array
    {
        return ["Tên Phòng", "Giá(VND)", "Tình trạng", "Danh Mục", "Ngày Nhập", "Ngày Sửa"];
    }
}