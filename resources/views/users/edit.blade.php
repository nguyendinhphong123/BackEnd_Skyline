@extends('layouts.master')
@section('content')
{{--  <main id="main">  --}}
    {{--  @include('sweetalert::alert')  --}}
    <form  action="{{route('users.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
        <h2 style="color: black" class="offset-5">Chỉnh sửa</h2>
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên Nhân viên </label>
            <input type="text" name="name" value='{{$item->name}}' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email </label>
            <input type="email" name="email" value='{{$item->email}}' class="form-control">
        </div>
         <div class="mb-3">
            <label class="form-label">Mật khẩu </label>
            <input type="password" name="password" value='{{$item->password}}' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày tham gia </label>
            <input type="date" name="created_at" value='{{$item->created_at}}' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" value='{{$item->address}}' class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image" value='{{$item->image}}'>
            <img type="hidden" width="120px" height="120px" id="blah1"
                                src="{{ $item->image}}" alt="" />
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="gender" id="" value="{{ $item->gender }}" class="form-control">
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Điện thoại</label>
            <input type="phone" name="phone" value='{{$item->phone}}' class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Trao quyền</label>
             <select name="group_id" class="custom-select">
              @foreach($groups as $key => $value)
              <option {{ $item->group_id==$value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
            </select>

          </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
        <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ</a>
      </form>
      </main>
@endsection
