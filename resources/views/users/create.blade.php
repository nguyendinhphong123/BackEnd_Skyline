@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">Thêm Nhân Viên</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ /</a></li>
                <form action="{{ route('users.store') }}" method='post' enctype="multipart/form-data">
                    <li class="breadcrumb-item active" aria-current="page"> Thêm Nhân Viên </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên nhân viên </label>
                            <input type="text" name='name' value="{{ old('name') }}" class="form-control"
                                id="exampleInputName1" placeholder="Tên">
                            @error('name')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="exampleInputEmail3" placeholder="Email">
                            @error('email')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Mật khẩu</label>
                            <input type="password" name='password' value="{{ old('password') }}" class="form-control"
                                id="exampleInputPassword4" placeholder="Password">
                            @error('password')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Trao quyền</label>
                            <select name="group_id" id="" class="form-control">
                                <option value="{{ old('group_id') }}">--Vui lòng chọn--</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }} </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" name="image" class="file-upload-default" value="{{ old('image') }}">
                            <div class="input-group col-xs-12">
                                <input type="file" name="image" id="Inputimage"class="form-control file ">
                                @error('image')
                                    <p class="text text-danger ">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Ngày tham gia</label>
                            <input type="date" class="form-control" name="created_at" id="exampleInputEmail1"
                                placeholder="Location" value="{{ old('created_at') }}">
                            @error('created_at')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Địa chỉ</label>
                            <input type="address" class="form-control" name="address" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('address') }}">
                            @error('address')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('birthday') }}">
                            @error('birthday')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Giới Tính<abbr name="Trường bắt buộc">*</abbr></label>
                            <select name="gender" id="" class="form-control" value="{{ old('gender') }}">
                                <option value="">--Vui lòng chọn--</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                            @error('gender')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Số điện thoại</label>
                            <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Thêm </button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
