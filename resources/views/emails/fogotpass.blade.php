<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      .form-gap {
    padding-top: 70px;
}
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@extends('layouts.login')
@section('content')
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Quên mật khẩu?</h2>
                  <p>Bạn có thể khôi phục lại mật khẩu ở đây.</p>
                  <div class="panel-body">
                    <form action="{{ route('sendmail') }}"  id="register-form" role="form" autocomplete="off" class="form" method="post">
                        @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Địa chỉ email" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Đặt lại mật khẩu" type="submit"> <br>
                        <a href="{{route('login')}}">Quay lại</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

@endsection 
</body>
</html>


