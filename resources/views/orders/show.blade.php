@extends('layouts.master')
@section('content')

<div class="page-header">
    <h3 class="page-title">Chi tiết đơn đặt phòng</h3>
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
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{route('orders.index')}}" class="btn btn-primary"> Quay lại </a>
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>Ảnh: </td>
                            <td><img style="width:120px; height:100px" src="{{ $data->image }}" alt="" class="image_photo"></td>
                        </tr>
                        <tr>
                            <td>Tên phòng: </td>
                            <td>{{$data->room_name}}</td>
                        </tr>
                        <tr>
                            <td>Số Lượng Ngày Đặt: </td>
                            <td>{{$numberOfDays}}</td>
                        </tr>
                        <tr>
                            <td>Giá 1 Ngày: </td>
                            <td>{{number_format( $data->price) }} đ</td>
                        </tr>
                        <tr>
                            <td>Tổng Giá: </td>
                            <td>{{ number_format($data->price * $numberOfDays) }} đ</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
