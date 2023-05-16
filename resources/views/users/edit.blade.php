
@extends('layouts.master')
@section('content')
 @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Chỉnh Sửa nhân viên </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Chỉnh Sửa nhân viên </li>
                <form  action="{{route('users.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('categories.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên nhân viên </label>
                            <input name="name" type="text" value='{{$item->name}}' class="form-control" >
                            @error('name')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email </label>
                            <input type="email" name="email" value='{{$item->email}}' class="form-control">
                            @error('email')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Mật khẩu </label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ngày tham gia </label>
                            <input type="date" name="created_at" value='{{$item->created}}' class="form-control">
                            @error('created_at')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Địa chỉ</label>
                            <input type="text" name="address" value='{{$item->address}}' class="form-control">
                            @error('address')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Điện thoại</label>
                            <input type="phone" name="phone" value='{{$item->phone}}' class="form-control">
                            @error('phone')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ngày sinh</label>
                            <input type="date" name="birthday" value='{{$item->birthday}}' class="form-control">
                            @error('birthday')
                            <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" value='{{$item->image}}'>
                            <img type="hidden" width="120px" height="120px" id="blah1"
                                                src="{{ $item->image}}" alt="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Giới tính</label>
                            <select name="gender" id="" class="form-control">
                                <option value="1" @selected($item->gender == 1)>Nam</option>
                                <option value="2" @selected($item->gender == 2)>Nữ</option>
                                <option value="3"@selected($item->gender == 3)>Khác</option>
                                @error('gender')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                              </select>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trao quyền</label>
                             <select name="group_id" class="custom-select">
                              @foreach($groups as $key => $value)
                              <option {{ $item->group_id==$value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
                              @endforeach
                              @error('group_id')
                              <p class="text text-danger ">{{ $message }}</p>
                          @enderror
                            </select>

                          </div>
                        <input type="submit" class="btn btn-info" value="Cập nhật" >
                        <a href="{{route('users.index')}}" class="btn btn-light">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
