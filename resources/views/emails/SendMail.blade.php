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

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            text-align: justify;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://huyentran226112.github.io/images/skyline.png" alt="Logo">
        </div>
        {{--$datas = [
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'price' => $request->price,
            'user' =>$user,
            'room' =>$room,
            'email' =>$user->email,
            'check' =>'confirmroom',
        ];  --}}
    <h1> Chào bạn :
        {{$data['user']->name}}
        </h1>
        <p>
        Kính gửi quý khách hàng,
        Chúng tôi, đại gia đình khách sạn Skyline, xin chân thành cảm ơn sự tin tưởng và ủng hộ quý khách đã dành cho chúng tôi. Việc quý khách đã chọn Skyline để trải nghiệm những kỳ nghỉ và kinh nghiệm đáng nhớ là một vinh dự lớn đối với chúng tôi.
        Chúng tôi cam kết luôn đặt sự hài lòng của quý khách lên hàng đầu và tạo ra môi trường lưu trú hoàn hảo. Đội ngũ nhân viên chuyên nghiệp và nhiệt tình của chúng tôi sẽ làm hết sức để đáp ứng mọi yêu cầu và mong muốn của quý khách trong suốt thời gian lưu trú tại khách sạn Skyline.
        Chúng tôi hy vọng quý khách sẽ tận hưởng không chỉ những tiện nghi hiện đại và dịch vụ chất lượng mà chúng tôi cung cấp, mà còn cả không gian sang trọng và không khí ấm cúng của khách sạn Skyline.
        Chúng tôi mong rằng trải nghiệm của quý khách sẽ vượt qua mong đợi và tạo ra những kỷ niệm đáng nhớ.
        Một lần nữa, chân thành cảm ơn sự lựa chọn của quý khách. Chúng tôi mong muốn được đón tiếp quý khách một lần nữa tại khách sạn Skyline và mang đến cho quý khách những trải nghiệm tuyệt vời.
        Trân trọng,
        Đại gia đình khách sạn Skyline
        </p>
    </div>
</body>
</html>
