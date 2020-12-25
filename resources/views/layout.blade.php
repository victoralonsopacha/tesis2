<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
    <style>
        .active a{
            color: red;
            text-decoration: none
        }
    </style>
</head>
<body>

    @include('partials.nav')

    @include('partials.session-status')

    @yield('content')

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>