<header class="header header_fixed">
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
                    <li><a href="{{ route('site.categories') }}">Meдиа</a></li>
                    <li><a href="{{ url('learning') }}">Академия</a></li>
                    <li><a href="{{ url('tournament') }}">Арена</a></li>
                </ul>
            </nav>
            <ul class="tournaments-submenu">
                <li><a class="active" href="javascript:void(0)"><span class="tournaments-submenu__icon tournaments-submenu__icon_premium">
                  <svg class="icon icon-ticket-star ">
                    <use xlink:href="./images/sprite-inline.svg#ticket-star"></use>
                  </svg></span><span class="tournaments-submenu__text">Премиум</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-discord ">
                    <use xlink:href="./images/sprite-inline.svg#discord"></use>
                  </svg></span><span class="tournaments-submenu__text">Discord</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-message ">
                    <use xlink:href="./images/sprite-inline.svg#message"></use>
                  </svg></span><span class="tournaments-submenu__text">Написать письмо</span></a></li>
                <li><a href="javascript:void(0)"><span class="tournaments-submenu__icon">
                  <svg class="icon icon-question ">
                    <use xlink:href="./images/sprite-inline.svg#question"></use>
                  </svg></span><span class="tournaments-submenu__text">Помощь</span></a></li>
            </ul>
        </div>
        <div class="header__search"><a href="javascript:void(0)">
                <svg class="icon icon-search ">
                    <use xlink:href="./images/sprite-inline.svg#search"></use>
                </svg></a></div><a class="header__enter" href="javascript:void(0)"><span>Войти</span>
            <div class="header__enter-icon"><img src="./images/enter-icon-mob.svg" alt=""/>
            </div></a>
    </div>
</header>
