<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('build/images/favicon/apple-touch-icon.png') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('build/images/favicon/favicon-32x32.png') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('build/images/favicon/favicon-16x16.png') }}"/>
    <link rel="manifest" href="{{ asset('build/images/favicon/site.webmanifest') }}"/>
    <link rel="mask-icon" href="{{ asset('build/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5"/>
    <meta name="msapplication-TileColor" content="#2b5797"/>
    <meta name="theme-color" content="#ffffff"/>
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('build/css/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('build/css/swiper.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('build/css/style.css') }}?v={{ hash_file('md5', public_path('build/css/style.css')) }}"/>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header-content">
            <a class="header-logo" href="{{ route('site.index') }}">
                <img src="{{ asset('build/images/logo.svg') }}" alt=""/>
            </a>
            <nav class="header-nav">
                @foreach($menuItems as $item)
                    <a href="{{ asset($item['link']) }}">
                        <div class="header-nav--icon">
                            <img src="{{ asset('build/images/head'.$loop->iteration.'.svg') }}" alt=""/>
                        </div>
                        <div class="header-nav--title">
                            <p>{{ $item['title'] }}</p><span>{{ $item['description'] }}</span>
                        </div>
                    </a>
                @endforeach
            </nav>
            <div class="header-search header-icon">
                <svg class="icon icon-search ">
                    <use xlink:href="{{ asset('build/images/sprite-inline.svg#search') }}"></use>
                </svg>
            </div>
            <div class="header-enter header-icon">
                <svg class="icon icon-enter ">
                    <use xlink:href="{{ asset('build/images/sprite-inline.svg#enter') }}"></use>
                </svg>
            </div>
            <div class="search">
                <form method="get" class="form" action="{{ route('site.search') }}">
                    <input name="q" type="text" placeholder="Поиск по сайту"/>
                    <button>
                        <svg class="icon icon-search ">
                            <use xlink:href="{{ asset('build/images/sprite-inline.svg#search') }}"></use>
                        </svg>
                    </button>
                </form>
                <div class="search-close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{ asset('build/images/sprite-inline.svg#close') }}"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-wrap">
                <a class="footer-logo" href="index.html">
                    <img src="{{ asset('build/images/logo.svg') }}" alt=""/>
                </a>
                <div class="footer-block footer-menu">
                    <div class="title title-h4"> Меню</div>
                    @foreach($menuItems as $item)
                        <a href="{{ asset($item['link']) }}">{{ $item['title'] }}</a>
                    @endforeach
                </div>
                <div class="footer-block footer-social">
                    <div class="title title-h4"> Мы в соцсетях</div>
                    <div class="social">
                        @if(config('settings.social_vk'))
                            <a href="{{ config('settings.social_vk') }}" target="_blank">
                                <svg class="icon icon-vk ">
                                    <use xlink:href="/build/images/sprite-inline.svg#vk"></use>
                                </svg>
                            </a>
                        @endif
                        @if(config('settings.social_fb'))
                            <a href="{{ config('settings.social_fb') }}" target="_blank">
                                <svg class="icon icon-facebook ">
                                    <use xlink:href="/build/images/sprite-inline.svg#facebook"></use>
                                </svg>
                            </a>
                        @endif
                        @if(config('settings.social_google'))
                            <a href="{{ config('settings.social_google') }}" target="_blank">
                                <svg class="icon icon-google ">
                                    <use xlink:href="/build/images/sprite-inline.svg#google"></use>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="footer-block footer-subscribe">
                    <div class="title title-h4"> Подписка</div>
                    <form method="post"
                          data-success-block="footer-subscribe-done"
                          class="js-send-form form form-line"
                          action="{{ route('site.subscribe') }}">
                        @csrf
                        <input name="mail" type="email" placeholder="Почта"/>
                        <button>
                            <svg class="icon icon-send ">
                                <use xlink:href="/build/images/sprite-inline.svg#send"></use>
                            </svg>
                        </button>
                    </form>
                    <div class="footer-subscribe-done">
                        <svg class="icon icon-check ">
                            <use xlink:href="/build/images/sprite-inline.svg#check"></use>
                        </svg>
                        <span class="sentence">Благодарим за подписку</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>{{ config('app.name') }} {{ date('Y') }}</p>
        </div>
    </div>
</footer>
<script src="{{ asset('build/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('build/js/svg4everybody.min.js') }}"></script>
<script src="{{ asset('build/js/smoothscroll.min.js') }}"></script>
<script src="{{ asset('build/js/swiper.min.js') }}"></script>
<script src="{{ asset('build/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('build/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('build/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('build/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('build/js/jquery.maskedinput.min.js') }}"></script>

@if(config('app.env') == 'local')
    <script src="{{ asset('build/js/dev-js.js') }}"></script>
@endif

<script src="{{ asset('build/js/main.js') }}?v={{ hash_file('md5', public_path('build/js/main.js')) }}"></script>
</body>
</html>
