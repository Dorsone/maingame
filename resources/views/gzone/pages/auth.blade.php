@extends('gzone.layouts.main')

@section('content')
    <main class="authorization">
        <div class="authorization__wrapper">
            <div class="authorization__entering-block entering-block"><a class="entering-block__logo" href="{{route("site.index")}}"><img src="{{asset("images/logo.svg")}}" alt=""/></a>
                <div class="entering-block__main">
                    <p class="entering-block__title">Личный кабинет</p>
                    <div class="tabs">
                        <div class="entering-block__menu-title tabs-menu"><span class="tabs-menu-item current">Войти</span><span class="tabs-menu-item">Регистрация</span></div>
                        <ul class="tabs-content">
                            <li class="current">
                                <form class="entering-block__form" action="{{route("site.login")}}" method="post">
                                    @csrf
                                    <div class="field-wrapper">
                                        <label for="form-login">Логин</label>
                                        <input type="text" id="form-login" name="email"/>
                                    </div>
                                    <div class="field-wrapper">
                                        <label for="form-pwd">Пароль</label>
                                        <input type="password" id="form-pwd" name="password"/>
                                    </div>
                                    <div class="form-actions">
                                        <button class="button" type="submit">Войти</button><a class="underline-link" href="{{route("send.letter")}}">Забыли пароль?</a>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="entering-block__form" action="{{route("send.registration.letter")}}" method="post">
                                    @csrf
                                    <div class="field-wrapper">
                                        <label for="form-email">Email</label>
                                        <input type="email" id="form-email" name="email"/>
                                    </div>
                                    <div class="field-wrapper-agree">
                                        <input type="checkbox" id="agree-checkbox"/>
                                        <label for="agree-checkbox">Разрешаю обработку моих личных данных</label>
                                    </div>
                                    <div class="form-actions">
                                        <button class="button" type="submit">Зарегистрироваться</button>
                                    </div>
                                </form>
                                <br>
                                <div class="form-actions">
                                    <a href="{{route("auth.steam")}}"><button class="button" type="submit">Steam</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="entering-block__bottom">
                    <p>1013 Centre RD STE 403B, г. Вильмингтон, штат Делавер, США</p>
                    <p>© 2011 - 2021 Maingame Все права защищены</p>
                </div>
            </div>
            <div class="authorization__img"><img src="{{asset("images/image-4.jpg")}}" alt=""/>
            </div>
        </div>
    </main>
@endsection
