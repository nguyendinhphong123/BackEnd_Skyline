<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
    h1{
        color: blue;
        text-align: center;
    }
    .login-form__footer{
        text-align: center;
    }
</style>
</head>
<body>
    @extends('layouts.login')
    @section('content')
        <form action="{{ route('admin.checklogin') }}" method="post">
            @csrf
            <div class="form-group">
                <h1>Đăng nhập</h1>
                <label for="">Email</label>
                <input type="text" id="userName" name="email" class="form-control input-sm chat-input"
                    placeholder="Nhập email" />
                   
            </div>
            @error('email')<p class="text text-danger ">{{ $message }}</p> @enderror
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input"
                    placeholder="Nhập mật khẩu" />
            </div>
            @error('password')<p class="text text-danger ">{{ $message }}</p> @enderror
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập </button>
            </div>

            <div class="form-group">
                <p class="mt-5 login-form__footer">
                    <a href="{{ route('forget-password') }}" class="text-primary">Quên Mật Khẩu?</a>
                </p>
                {{--  <a href="{{route('forget-password')}}">Quên Mật Khẩu</a>  --}}
            </div>

        </form>
    @endsection

</body>
</html>
