<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel='stylesheet' href='{{ asset("css/login.css") }}'>
    @yield('script')
    
</head>
<body>

            @yield('content')

</body>
</html>