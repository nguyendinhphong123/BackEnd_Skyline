@extends('layouts.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">Chi tiết phòng</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Chi tiết phòng </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{route('rooms.index')}}" class="btn btn-primary"> Quay lại </a>
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>ID: </td>
                            <td>{{$items->id}}</td>
                        </tr>
                        <tr>
                            <td>Tên phòng: </td>
                            <td>{{$items->name}}</td>
                        </tr>
                        <tr>
                            <td>Giá: </td>
                            <td>{{number_format($items->price)}} vnd</td>
                        </tr>
                        <tr>
                            <td>Số lượng: </td>
                            <td>{{$items->quantity}}</td>
                        </tr>
                        <tr>
                            <td>Mô tả: </td>
                            <td>{!!$items->description!!}</td>
                        </tr>
                        <tr>
                            <td>Ảnh: </td>
                            <td><img  style="width:120px; height:100px" src="{{ $items->image }}" alt=""class="image_photo"></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

