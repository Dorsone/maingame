<header class="header">
    <div class="header__inner"><a class="header__logo" href="{{ route('site.index') }}"><img src="{{ asset('images/logo.svg') }}" alt=""/></a>
        <div class="header__burger burger">
            <div class="burger__icon">
                <div class="burger__bar"></div>
                <div class="burger__bar"></div>
                <div class="burger__bar"></div>
            </div>
        </div>
        <div class="header__menu">
            <nav class="header__nav">
                <ul>
                    <li><a href="{{ route('site.articles') }}">Новости</a></li>
                    <li><a href="{{ route('site.categories') }}">Meдиа</a></li>
                    <li><a href="{{ url('learning') }}">Академия</a></li>
                    <li><a href="{{ url('tournament') }}">Арена</a></li>
                </ul>
            </nav>
            <ul class="tournaments-submenu">
                <li><a class="active" href="javascript:void(0)"><span class="tournaments-submenu__icon tournaments-submenu__icon_premium">
                  <svg class="icon icon-ticket-star ">
                    <use xlink:href="{{ asset('images/sprite-inline.svg#ticket-star') }}"></use>
                  </svg></span><span class="tournaments-submenu__text">Премиум</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-discord ">
                    <use xlink:href="{{ asset('images/sprite-inline.svg#discord') }}"></use>
                  </svg></span><span class="tournaments-submenu__text">Discord</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-message ">
                    <use xlink:href="{{ asset('images/sprite-inline.svg#message') }}"></use>
                  </svg></span><span class="tournaments-submenu__text">Написать письмо</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-question ">
                    <use xlink:href="{{ asset('images/sprite-inline.svg#question') }}"></use>
                  </svg></span><span class="tournaments-submenu__text">Помощь</span></a></li>
            </ul>
        </div>
        <div class="header__search">
            <button class="header__search-btn">
                <svg class="icon icon-search ">
                    <use xlink:href="{{ asset('/images/sprite-inline.svg#search') }}"></use>
                </svg>
            </button>
        </div>
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="header__user">
                <div class="header__user-profile"><span class="header__user-name">{{auth()->user()->username}}</span>
                    <div class="header__user-icon"><img src="{{asset("images/logo-icon.svg")}}" alt=""/>
                    </div>
                </div>
                <div class="header__user-menu user-menu">
                    <ul>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="{{route('profile.index')}}"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-profile ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#profile")}}"></use>
                </svg></span>Игровой профиль</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="{{route('profile.bookmark.index')}}"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-bookmark ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#bookmark")}}"></use>
                </svg></span>Мои закладки</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="{{route('profile.history.index')}}"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-calendar1 ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#calendar1")}}"></use>
                </svg></span>История просмотров</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="javascript:void(0)"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-category ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#category")}}"></use>
                </svg></span>Мои устройства</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_premium" href="javascript:void(0)"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-ticket ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#ticket")}}"></use>
                </svg></span>Премиум</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="{{route("profile.settings")}}"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-setting ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#setting")}}"></use>
                </svg></span>Настройки аккаунта</a></li>
                        <li><a class="user-menu__nav-item user-menu__nav-item_link" href="{{route("logout")}}"><span class="user-menu__nav-item-icon">
                <svg class="icon icon-logout ">
                  <use xlink:href="{{asset("images/sprite-inline.svg#logout")}}"></use>
                </svg></span>Выйти</a></li>
                    </ul>
                </div>
            </div>
        @else
            <a class="header__enter" href="{{ route('site.login') }}"><span>Войти</span>
                <div class="header__enter-icon"><img src="{{ asset('images/enter-icon-mob.svg') }}" alt=""/>
                </div></a>
        @endif
    </div>
</header>
