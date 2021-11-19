@extends("site.auth.layout")

@section('title', "Вход/Регистрация")

@section("content")
<div class="entering-block__main">
    <p class="entering-block__title">Личный кабинет</p>
    <div class="tabs">
        <div class="entering-block__menu-title tabs-menu"><span class="tabs-menu-item current">Войти</span><span class="tabs-menu-item">Регистрация</span></div>
        <ul class="tabs-content">
            <li class="current">
                <form class="entering-block__form" action="{{route("login")}}" method="post">
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
                        <button class="button" type="submit">Войти</button>
                        <a class="underline-link" href="{{route("send.letter")}}">Забыли пароль?</a>
                    </div>
                </form>
            </li>
            <li>
                <form class="entering-block__form" action="{{route("register")}}" method="post">
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
            </li>
        </ul>
    </div>
</div>
@endsection