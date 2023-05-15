@extends('layouts.master')
@section('content')

<div class="page-header">
    <h3 class="page-title">Quản lý khách hàng</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Quản lý khách hàng </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">

                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}" name="id">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập tên" class="form-control" value="{{ request()->name }}" name="name">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập địa chỉ" class="form-control" value="{{ request()->address }}" name="address">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info"> Tìm </button>
                            <a href="{{ route('customers.index') }}" type="submit" class="btn btn-secondary">Đặt lại</a>
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
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
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