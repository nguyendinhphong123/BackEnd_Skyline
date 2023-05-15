@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="page-header">
    <h3 class="page-title">Quản lý đơn đặt phòng</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Quản lý đơn đặt phòng </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{route('orders.create')}}" class="btn btn-primary"> Thêm mới </a>
                            <a href="{{ route('orders.export') }}" class="btn btn-warning">Xuất excel</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Nhập tên" class="form-control" value="{{ request()->name }}" name="name">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập địa chỉ" class="form-control" value="{{ request()->address }}" name="address">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập sđt" class="form-control" value="{{ request()->phone }}" name="phone">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info"> Tìm </button>
                            <a href="{{ route('orders.index') }}" type="submit" class="btn btn-secondary">Đặt lại</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
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
                                    <a href="{{ route('orders.detail', [$item->id]) }}" class="btn btn-info">Chi
                                        tiết</a>
                                </td>
                            </tr>
                            @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <nav class="float-right">
                    {{ $items->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection