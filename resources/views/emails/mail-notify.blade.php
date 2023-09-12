{{--
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
        <h1>HOTEL-SKYLINE</h1>
        <h2>Chào bạn : {{ $data['name'] }}</h2>
        <h3> Chúng tôi đã khôi phục thành công tài khoản của bạn </h3>
        <p>Mật khẩu của bạn là <b>{{ $data['password'] }}</b></p>
     </div>
</body>
</html>  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
            font-size: 24px;
            margin-top: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        b {
            color: #007bff;
        }

        .logo img {
            width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://huyentran226112.github.io/images/skyline.png" alt="Logo">
        </div>
        <p>Chào bạn: {{ $data['name'] }}</p>
        <p>Bạn đã yêu cầu cấp lại mật khẩu của mình. Chúng tôi đã nhận được yêu cầu này và đang tiến hành quy trình cấp lại mật khẩu cho bạn.
            Dưới đây là thông tin cấp lại mật khẩu của bạn:  </p>
           <p> Tên đăng nhập: {{ $data['email'] }}</p>
           <p>   Mã đặc biệt: {{ $data['password'] }}</p>
           <p> Xin cảm ơn bạn và chúc bạn một ngày tốt lành!
            Trân trọng,
            Bộ phận hỗ trợ khách hàng

        </p>
    </div>
</body>
</html>


