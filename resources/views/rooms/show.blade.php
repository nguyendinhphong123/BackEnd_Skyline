@extends('layouts.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">Chi tiết phòng </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Chi tiết phòng </li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-center">
                    <div style=" margin-top: 24px;" class="main_image">
                        <img src="{{ $items->image }}" id="main_product_image" height="360" width="462">
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
                                            <td>ID</td>
                                            <td>{{ $items->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên phòng</td>
                                            <td>{{ $items->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>{{number_format($items->price)}} vnd</td>
                                        </tr>
                                        <tr>
                                            <td>Tình trạng</td>
                                            <td>{{ $items->status == 1 ? 'Còn phòng' : 'Hết phòng' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td>{!! wordwrap($items->description, 70, "<br>", true) !!}</td>

                                        </tr>
                                    </tbody>
                                </table> 
                                <br>
                                <a href="{{ route('rooms.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

