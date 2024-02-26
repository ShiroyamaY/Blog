<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Food Blog</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

{{--    <!-- Scripts -->--}}
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{asset('css/responsive/responsive.css')}}" rel="stylesheet">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="yummy-load"></div>
</div>

<!-- ****** Header Area Start ****** -->
<x-header></x-header>
<!-- ****** Header Area End ****** -->

@yield('content')

<!-- ****** Footer Menu Area Start ****** -->

<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copywrite Text -->
                <div class="copy_right_text text-center">
                    <p>Copyright @2018 All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ****** Footer Menu Area End ****** -->

<!-- Jquery-2.2.4 js -->
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap-4 js -->
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins JS -->
<script src="{{asset('js/others/plugins.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('js/active.js')}}"></script>
<script src="https://kit.fontawesome.com/9647ab03f6.js" crossorigin="anonymous"></script>
</body>
