<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('sweetalert::alert')

    <form action="{{ route('sendmail') }}" method="POST">
        @csrf
        <input type="email" name="email" placehorder="Nhap email">
        <input type="submit">
        @error('email')
            {{ $message }}
        @enderror
    </form>

</body>

</html>
