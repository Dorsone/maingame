<!DOCTYPE html>
<html class="full-height" lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/><link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon/favicon-16x16.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    @yield('style')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GH7RDNRNGG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GH7RDNRNGG');
    </script>
</head>
<body class="full-height">
@yield('header')
@yield('content')
@include('gzone.partials.popups')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/svg4everybody.min.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/datepicker-ru.js') }}"></script>
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/add-bookmark.js') }}"></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@yield('js')
<!-- REMOVE THIS SCRIPT \/ ON REAL SITE-->
<script defer="defer" src="{{ asset('js/dev-js.js') }}"></script>
<!-- REMOVE THIS SCRIPT /\ ON REAL SITE-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
