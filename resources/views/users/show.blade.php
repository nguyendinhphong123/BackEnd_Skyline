@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">Chi tiết nhân viên </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Chi tiết nhân viên </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-center">
                        <div style=" margin-top: 24px;" class="main_image">
                            <img src="{{ $items->image }}" id="main_product_image" height="300" width="412">
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
                                                <td>Tên</td>
                                                <td>{{ $items->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại</td>
                                                <td>{{ $items->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Giới tính</td>
                                                <td>{{ $items->gender == 1 ? 'NAM' : 'NỮ' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chức vụ</td>
                                                <td>{{ $items->group->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ</td>
                                                <td>{{ $items->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ngày sinh</td>
                                                <td>{{ $items->birthday }} </td>
                                            </tr>
                                            <tr>
                                                <td>Ngày tham gia</td>
                                                <td>{{ $items->created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                    <br>
                                    <a href="{{ route('users.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
