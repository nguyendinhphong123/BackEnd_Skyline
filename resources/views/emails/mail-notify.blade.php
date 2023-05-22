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

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://lh3.googleusercontent.com/-aVOCI1uHdknDwW5zPSWJtTNdAw5oT9wpcvH4YhZd-bGK3ALRqeDFeWrlPICH5eQAV4TMABEbOx16ox3A8zKRVuVw5PmTYLBoRMZO1XZ5kKWj6fju_nwfq1898FhbebwX3jAhCJnUTY8IrN3GrQr3K_PgCSQetBKJPxsk7C6KYo9y7cWH0-ph_PEUdp0zEXoE_l42kqos-WxYhGrRXr67QEs3I46fSrRDHL9tSRIq0t6v0NNa3loCqesgYM1YHws47Ms7oTLNmdLb87tXp2Q712spHmGruxphy45AwzYVNp8vDsD4qiFKgRZPczs0tROj8Dg_RmBlsXb1PnOUK-xzrbMcmxuuWKY-Ww1sWBM7HRncxdrDZiy_pduVV7rVBxNnLtUF8J_w8LsrGgBrOBeAQIKFJW-ZJ5hE9X-L0w_RI8oIN5uGkTOyfO7CVFrWZ3-H1RnJYBSlwn2rHjY6VXYfoidk7pP_kkkSSBCd_Q10nfJnQmMz2hindztjnDF0MBoBvgmrI68GN_YuDFCBLZDXryfMtcmLs-74kFfpGfDru1MWBAnvy2cS0nvEi5n_5-zW6EOtRBL7oavFtHQ-MIxS0Ni8eGA5D_dcHpasESBLfmTle6uvkW_0HL_LzM8lLkdIxicDxC-kosY5kZB1LRDNRbtlFDWhfML5tsteyCaD9rHq58sopkWEntjylCdl0K7dp0pjf8yAkxkgLNachpnJ9WmhF7dl30ffpP1BOW26m8VD5wqM6TS8lfMAwbI7FnjUuub7LLMHRwePOej36msp81xWVoLwiG1PUY6KNonsvXL51lAsaWCG_aAFa-0C9Yk-eRrNsPoHrGkPKVA0o1QeIwW8vACewBGosg17FCcb9DddaQ1K1r59xmfuGEDtG-S04L4SY4If0MStSW6Si-4D8sUmQAFnw3uzaWrvHPtJCc=w273-h119-s-no?authuser=0" alt="Logo">
        </div>
        <h2>Chào bạn: {{ $data['name'] }}</h2>
        <h3>Chúng tôi đã khôi phục thành công tài khoản của bạn</h3>
        <p>Mật khẩu của bạn là: <b>{{ $data['password'] }}</b></p>
    </div>
</body>
</html>
