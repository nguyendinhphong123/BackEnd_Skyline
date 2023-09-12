<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .logo img {
            width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
        }

        h1 ,h2{
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
        }

        p {
            display: block;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://huyentran226112.github.io/images/skyline.png" alt="Logo">
        </div>
    <h1> Chào bạn :
        {{$data['user']->name}}</h1>
        <h2>THÔNG TIN ĐẶT PHÒNG</h2>
        <p>Mã phòng : {{ $data['room']->id }}</p>
        <p>Tên phòng: {{ $data['room']->name }}</p>
        <p>Ngày đặt phòng: {{ $data['checkin'] }}</p>
        <p>Ngày trả phòng : {{ $data['checkout'] }}</p>
        <p>Giá phòng : {{ number_format($data['price']) }} /ngày</p>
        <p>Tổng tiền : {{ number_format($data['total']) }} VNĐ</p>
        <h2>LỜI CẢM ƠN</h2>
        <p>Kính gửi quý khách hàng.</p>
        <p>Chúng tôi xin chân thành cảm ơn bạn đã đặt phòng tại khách sạn Skyline - nơi dừng chân lý tưởng!</p>
        <p>Khách sạn Skyline hân hạnh được đón tiếp bạn với dịch vụ chất lượng cao, không gian thoải mái và đẳng cấp.
        Chúng tôi cam kết mang đến cho bạn một trải nghiệm nghỉ dưỡng đáng nhớ, một lần nữa, cảm ơn bạn đã chọn khách sạn Skyline là
        điểm đến cho chuyến du lịch của bạn. Chúng tôi mong rằng bạn sẽ có một kỳ nghỉ thú vị và thư giãn tuyệt vời tại đây.</p>
        <p>Trân trọng cảm ơn !</p>
    </div>
</body>
</html>
