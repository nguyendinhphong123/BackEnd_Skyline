
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
        };
        h3{
            font-size:24px
        }
    </style>
</head>
<body>
    <div>
        <h1>HOTEL-BOOKING</h1>
        <h2>Chào bạn : {{ $data['name'] }}</h2>
        <h3>Chúng tôi đã khôi phục thành công tài khoản của bạn </h3>
        <p>Mật khẩu của bạn là <b>{{ $data['password'] }}</b></p>
     </div>
</body>
</html>


