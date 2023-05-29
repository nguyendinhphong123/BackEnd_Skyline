@extends('layouts.master')
@section('content')

<div class="page-header">
    <h3 class="page-title">Thêm mới</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Thêm mới đơn đặt</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('orders.store') }}" method='post'>
                    @csrf
                    <div class="form-group">
                        <label>Tên Phòng</label>
                        <select name="room_id" id="" class="form-control">
                            <option value="">--Vui lòng chọn--</option>
                            @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                            @endforeach
                        </select>
                        @error('room_id')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Khách hàng</label>
                        <select name="customer_id" id="" class="form-control">
                            <option value="">--Vui lòng chọn--</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="0" value="{{ old('price') }}">
                        @error('price')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Checkin</label>
                        <input type="date" class="form-control" name="checkin" placeholder="0" value="{{ old('checkin') }}">
                        @error('checkin')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Checkout</label>
                        <input type="date" class="form-control" name="checkout" placeholder="0" value="{{ old('checkout') }}">
                        @error('checkout')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Thêm </button>
                    <a href="{{route('orders.index')}}" class="btn btn-warning">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
