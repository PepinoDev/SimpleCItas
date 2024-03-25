<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- <link rel="apple-touch-icon" sizes="57x57" href="img/fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
        <link rel="manifest" href="img/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="img/fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                
        {{-- <script type="text/javascript" src="{{asset('js/slider.js')}}" defer></script>
        <script type="text/javascript" src="{{asset('js/toogle.js')}}" defer></script> --}}
        {{-- <link rel="stylesheet" href="output.css"> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title>Simple Citas</title>
    </head>
<body class="relative w-full h-screen">

    <div class="absolute top-0 left-0 w-full h-screen mt-10 bg"></div>
    <div class="relative flex flex-col justify-center w-full h-48 mt-10">
        <h1 class="block p-10 mt-10 text-3xl font-extrabold text-center text-black">Simple Citas</h1>    
    @yield('content')
    </div>
    
</body>
</html>