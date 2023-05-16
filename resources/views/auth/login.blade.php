@extends('layouts.login')
@section( 'content')
<form action="{{route('admin.checklogin')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" id="userName" name="email" class="form-control input-sm chat-input"
        placeholder="username" />
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input"
        placeholder="password" />
    </div>

    <div class="form-group">
        <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
        <a href="{{route('forget-password')}}">Quên Mật Khẩu</a>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
    </div>
   
</form>
@endsection