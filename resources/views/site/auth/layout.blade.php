<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("build/images/favicon/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("build/images/favicon/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("build/images/favicon/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("build/images/favicon/site.webmanifest")}}">
    <link rel="mask-icon" href="{{asset("build/images/favicon/safari-pinned-tab.svg")}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("build/css/jquery.fancybox.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("build/css/swiper.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("build/css/jquery-ui.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("build/css/OverlayScrollbars.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("build/css/style.css")}}"/>
</head>
<body>
<main class="authorization">
    <div class="authorization__wrapper">
        <div class="authorization__entering-block entering-block">
            <a class="entering-block__logo" href="index.html"><img src="{{asset("build/images/logo.svg")}}" alt=""/></a>
            @yield("content")
            <div class="entering-block__bottom">
                <p>1013 Centre RD STE 403B, г. Вильмингтон, штат Делавер, США</p>
                <p>© 2011 - 2021 Maingame Все права защищены</p>
            </div>
        </div>
        <div class="authorization__img"><img src="{{asset("build/images/image-4.jpg")}}" alt=""/>
        </div>
    </div>
</main>

<script src="{{asset("build/js/jquery-3.4.1.min.js")}}"></script>
<script src="{{asset("build/js/svg4everybody.min.js")}}"></script>
<script src="{{asset("build/js/swiper.min.js")}}"></script>
<script src="{{asset("build/js/jquery.fancybox.min.js")}}"></script>
<script src="{{asset("build/js/jquery-ui.min.js")}}"></script>
<script src="{{asset("build/js/datepicker-ru.js")}}"></script>
<script src="{{asset("build/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- REMOVE THIS SCRIPT \/ ON REAL SITE-->
<script defer="defer" src="{{asset("build/js/dev-js.js")}}"></script>
<!-- REMOVE THIS SCRIPT /\ ON REAL SITE-->
<script src="{{asset("build/js/main.js")}}"></script>
</body>
</html>