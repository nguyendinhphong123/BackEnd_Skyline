
@extends('layouts.master')
@section('content')
 @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Chỉnh Sửa quyền</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Chỉnh Sửa quyền </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('groups.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên quyền</label>
                            <input name="name" type="text" value='{{$item->name}}' class="form-control" >
                            @error('name')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-info" value="Cập nhật" >
                        <a href="{{route('groups.index')}}" class="btn btn-light">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
