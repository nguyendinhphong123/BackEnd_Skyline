<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        {{--$datas = [
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'price' => $request->price,
            'user' =>$user,
            'room' =>$room,
            'email' =>$user->email,
            'check' =>'confirmroom',
        ];  --}}
    <h1>chao ban
        {{$data['user']->name}}
        </h1>
       <p> cảm ơn vì đã đặt hàng .</p>
    </div>
</body>
</html>
