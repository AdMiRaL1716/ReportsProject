<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('fav.ico')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/argon.css?v=1.2.0')}}" type="text/css">
</head>
<body>
<div id="app">
@yield('content')
<!-- Core -->
    <script src="{{asset('dashboard/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('dashboard/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('dashboard/js/argon.js?v=1.2.0')}}"></script>
    <script src="{{asset('js/admin-actions.js')}}"></script>
</div>
</body>
</html>
