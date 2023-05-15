@extends('layouts.master')
@section('content')

    <div class="container">
    
        <table class="table" style="text-align:center">
            <thead>
                <h2 style="text-align: center">Danh Sách Đơn Đặt Phòng</h2><br>
                <a href="{{route('orders.create')}}" class="btn btn-info">Thêm mới</a>
                <a href="{{ route('orders.export') }}" class="btn btn-warning">Xuất file excel</a>
                <tr>
                    <th>STT</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Ngày Đặt Phòng</th>
                    <th>Ngày Trả Phòng</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->customer->name }}</td>
                                <td>{{ $item->customer->address }}</td>
                                <td>{{ $item->customer->email }}</td>
                                <td>{{ $item->customer->phone }}</td>
                                <td>{{ $item->checkin }}</td>
                                <td>{{ $item->checkout }}</td>
                                
                                <td>
                                    <a href="{{ route('orders.detail', [$item->id]) }}" class="btn btn-info">Chi tiết</a>
                                </td>
                                    </tr>
                                @endforeach
                    </tr>
                </tbody>
    
            </table>
            {{ $items->links() }}
        </div>
@endsection