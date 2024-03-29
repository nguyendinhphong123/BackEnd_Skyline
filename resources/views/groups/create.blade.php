@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">Thêm Mới quyền</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Thêm Mới quyền </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('groups.store') }}" method='post' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên quyền</label>
                            <input name="name" type="text" class="form-control" placeholder="Nhập tên ">
                            @error('name')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-info" type="submit">Thêm</button>
                            <a href="{{ route('groups.index') }}" class="btn btn-light">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
