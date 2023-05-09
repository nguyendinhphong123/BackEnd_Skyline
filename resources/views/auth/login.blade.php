<style>
    /*author:starttemplate*/
/*reference site : starttemplate.com*/
body {
  background-image:url('https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/ca/38/3a/au-lac-charner-hotel.jpg?w=1200&h=-1&s=1');
  background-position:center;
  background-size:cover;
  
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
  font-family: 'Dancing Script', cursive!important;
}
.container {
    padding: 110px;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #ffffff!important;
    opacity: 1; /* Firefox */
    font-size:18px!important;
}
.form-login {
    background-color: rgb(0, 0, 0);
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    color:white;
    box-shadow:0 1px 0 #cfcfcf;
    margin: 0px 0px 0px -140px;
    width: 400px;
}
.form-control{
    background:transparent!important;
    color:white!important;
    font-size: 18px!important;
}
h1{
    color:white!important;
}
h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}
.form-control {
    border-radius: 10px;
}
.text-white{
    color: white!important;
}
.wrapper {
    text-align: center;
}
.footer p{
    font-size: 18px;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--author:starttemplate-->
<!--reference site : starttemplate.com-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>Unique Login Form | Bootstrap Templates</title>
    <link href="css/style.css" rel="stylesheet" id="style">
    <!-- Bootstrap core Library -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <!-- Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
              <div class="form-login"><br>
                <h4>Đăng Nhập Tại Đây</h4>
                <br>
                <form action="{{route('admin.checklogin')}}" method="post">
                    @csrf
                <input type="text" id="userName" name="email" class="form-control input-sm chat-input" placeholder="username"/>
                <br><br>
                {{-- @error('email')
                <div class="text text-danger">{{ $message }}</div>
            @enderror --}}
                <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password"/>
                <br>
                @error('password')
                <div class="text text-danger">{{ $message }}</div>
            @enderror <br>
                <div class="wrapper">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <!--footer-->
    <div class="footer text-white text-center">
        <p>© 2020 Unique Login Form. All rights reserved | Design by <a href="https://freecss.tech">Free Css</a></p>
    </div>
    <!--//footer-->
</div>
</body>
</html>