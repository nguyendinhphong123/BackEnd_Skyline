@extends('layouts.master')
@section('content')

<div class="container py-5 h-100">
  
    <div class="card" style="border-radius: 10px;">
        <div class="card-header px-4 py-5">
            <h5 style="text-align:center;">Chi Tiết Đơn Đặt Phòng, <span style="color: rgb(248, 61, 61);">Shop
                    Admin</span>!</h5>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" style="color: rgb(248, 61, 61);">Phòng Đang Được Đặt
                </p>
            </div>
            @php
            @endphp
            <div class="row">
                <div class="col-md-2">Ảnh</div>
                <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                    Tên Phòng</div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    Số Lượng Ngày Đặt</div>
                    
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    Giá 1 Ngày</div>
                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    Tổng Giá</div>
            </div>
            <div class="card shadow-0 border mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('rooms.show',$data->id)}}">
                                <img style="width:120px; height:100px" src="{{ $data->image }}" alt="" class="image_photo">
                            </a>
                        </div>
                        <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0">{{$data->room_name}}
                            </p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">{{$numberOfDays}}
                            </p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">
                                {{number_format( $data->price) }} đ</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">
                                {{ number_format($data->price * $numberOfDays) }} đ
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('orders.index') }}" class="btn btn-warning">Thoát</a>
    </div>
</div>
@endsection
