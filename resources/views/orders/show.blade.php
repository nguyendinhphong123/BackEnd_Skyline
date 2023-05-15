@extends('layouts.master')
@section('content')

<div class="page-header">
    <h3 class="page-title">Chi tiết đơn đặt phòng </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Chi tiết đơn đặt phòng </li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-center">
                    <div style=" margin-top: 24px;" class="main_image">
                        <img src="{{ $data->image }}" id="main_product_image" height="300" width="412">
                    </div><br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 right-side">
                    <div class="product-info-tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Tên phòng</td>
                                            <td>{{ $data->room_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng ngày đặt</td>
                                            <td>{{$numberOfDays}} vnd</td>
                                        </tr>
                                        <tr>
                                            <td>Giá 1 ngày</td>
                                            <td>{{number_format( $data->price) }} vnđ</td>
                                        </tr>
                                        <tr>
                                            <td>Tổng giá</td>
                                            <td>{{ number_format($data->price * $numberOfDays) }} vnđ</td>
                                        </tr>
                                    </tbody>
                                </table> 
                                <br>
                                <a href="{{ route('orders.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
