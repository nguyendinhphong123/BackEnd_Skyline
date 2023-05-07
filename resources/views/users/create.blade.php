@extends('layouts.master')
@section('content')
 <main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{route('users.store')}}" method='post' enctype="multipart/form-data">
                        <h2 style="color: black" class="offset-5">Thêm Nhân Viên </h2>
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên Nhân Viên</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('name')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="form-group col-lg-4">
                            <label class="control-label" for="flatpickr01">Giới Tính<abbr
                                    name="Trường bắt buộc">*</abbr></label>
                            <select name="gender" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                            @error('gender')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('email')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                            <input type="phone" class="form-control" name="phone" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('phone')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('password')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                            <input type="address" class="form-control" name="address" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('address')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('birthday')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ngày tham gia </label>
                            <input type="date" class="form-control" name="created_at" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('created_at')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Trao quyền</label>
                            {{--  <select name="group_id" id="" class="form-control">  --}}
                                <select name="group_id" id="" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                @foreach ($groups as $group)

                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                                </select>
                            </select>
                              @error('group_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Inputimage" class="form-label">Ảnh</label>
                            {{--  <input type="file" class="form-control" name="image" id="Inputimage">  --}}
                            <input type="file" name="image"id="Inputimage"class="form-control file ">
                        </div>
                        @error('group_id')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="d-grid">
                            <button class="btn btn-info" type="submit">Thêm</button>
                            <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
