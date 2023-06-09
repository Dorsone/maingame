@extends('gzone.layouts.main')

@section('title', 'Восстановление пароля - отправка кода')

@section('content')
    <main class="authorization">
        <div class="authorization__wrapper">
            <div class="authorization__entering-block entering-block"><a class="entering-block__logo" href="{{route("site.index")}}"><img src="{{asset("images/logo.svg")}}" alt=""/></a>
                <div class="entering-block__main">
                    <p class="entering-block__title">Забыл пароль</p>
                    <p class="entering-block__subtitle">Создайте новый пароль</p>
                    <div class="progress-bar">
                        <div class="progress-bar__passed progress-bar__passed_100"></div><span class="progress-bar__item active"></span><span class="progress-bar__item active"></span><span class="progress-bar__item active"></span>
                    </div>
                    <form class="entering-block__form" action="{{route("change.password", $user->id)}}" method="post">
                        @csrf
                        <div class="field-wrapper">
                            <label for="form-pwd">Пароль</label>
                            <input class="enter-pass" type="password" id="form-pwd" name="password"/>
                            <div class="eye" data-action="see-password" data-toggle="enter-pass"></div>
                        </div>
                        <div class="field-wrapper">
                            <label for="form-pwd-repeat">Подтвердите пароль</label>
                            <input class="enter-pass" type="password" id="form-pwd-repeat" name="password_confirmation"/>
                            <div class="eye" data-action="see-password" data-toggle="enter-pass"></div>
                        </div>
                        <div class="form-actions"><a class="button button_transp-hover" href="{{route("send.letter")}}">Назад</a>
                            <button class="button" type="submit">Далее</button>
                        </div>
                    </form>
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