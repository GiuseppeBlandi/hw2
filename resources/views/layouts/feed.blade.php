<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
    const CSFR_TOKEN = '{{ csrf_token() }}';
    </script>
    @yield('style')
    @yield('script')
</head>
<html>
    <body>
       <nav>  
           
            <a href='{{ url("home") }}' class="home">
                <img src="images/home.png" class="hidden">
                <span class="tutto">Tutto</span> <span class="f1">F1</span>
            </a> 
            
            <a href='{{ url("create") }}' class="nav_content">
                <span>Crea post</span>
                <div class="nuovo_post"> </div>
            </a>
            
            <a href='{{ url("classifiche") }}' class="nav_content">
                <span>Classifiche</span>
                <div class="classifiche_image"></div>
            </a>
           
            <a href='{{ url("profile") }}' class="nav_content">
                <span>{{$user['name']}}</span>
               <div class="profile_image"></div>
            </a>

            <a href='{{ url("logout") }}' class="logout" >
                <div class="logout_image"></div>
                <span class="log">Log</span> <span class="out">out</span>
            </a>    
        
        </nav>
        
        @yield('content')

        <footer>
        <div>
            Creato da Giuseppe Blandi <br>
            1000001403
        </div>
    </footer>
    <body>
<html>
