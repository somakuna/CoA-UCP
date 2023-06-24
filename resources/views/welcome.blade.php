<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CoA UCP</title>
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">
        <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Styles -->
        <style>
         body { 
            background-image: url('https://i.ibb.co/bNDYRN8/1282778.jpg');
            background-repeat: no-repeat;   
        }
         </style>
    </head>
    <body>
        <div class="p-5 text-center bg-dark shadow">
            <div class="mb-3"><img src="https://forum.cityofangels-roleplay.com/data/assets/logo/logo_coa.png" alt="COA"></div>
            <h1 class="text-white">City of Angels Roleplay</h1>
            <p class="col-lg-8 mx-auto fs-5 text-secondary">
              User Control Panel
            </p>
            <div class="d-inline-flex gap-2 mb-3">
              <a href="{{ route('login') }}" class="btn btn-lg btn-primary px-4">Login</a>
              <a href="{{ route('register') }}" class="btn btn-secondary btn-lg px-4">Register</a>
            </div>
          </div>
        </div>
    </body>
</html>
