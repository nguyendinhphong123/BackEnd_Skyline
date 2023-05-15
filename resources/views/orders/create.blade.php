@extends('layouts.master')
@section('content')

<main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method='post' >
                        <h2 style="color: black" class="offset-5">Thêm Đơn Đặt Phòng</h2>
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Giá</label>
                            <input type="text" class="form-control" name="price" id="exampleInputPassword1">
                        </div>
                        {{-- @error('price')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror --}}
                      
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Checkin</label>
                            <input type="date" class="form-control" name="checkin" id="exampleInputPassword1">
                        </div>
                        {{-- @error('description')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Checkout</label>
                            <input type="date" class="form-control" name="checkout" id="exampleInputPassword1">
                        </div>
                        {{-- @error('description')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tên Phòng</label>
                            <select name="room_id" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @error('category_id')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror --}}
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Khách hàng</label>
                            <select name="customer_id" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @error('category_id')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror --}}
                      
                        <div class="d-grid">
                            <button class="btn btn-info" type="submit">Thêm</button>
                            <a href="{{route('orders.index')}}" class="btn btn-warning">Quay lại</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
