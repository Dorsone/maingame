@extends('gzone.layouts.main')

@section('content')
    <main class="authorization">
        <div class="authorization__wrapper">
            <div class="authorization__entering-block entering-block"><a class="entering-block__logo" href="{{route("site.index")}}"><img src="{{asset("images/logo.svg")}}" alt=""/></a>
                <div class="entering-block__main">
                    <p class="entering-block__title">Забыл пароль</p>
                    <p class="entering-block__subtitle">Напишите email и мы вышлем вам код для входа</p>
                    <div class="progress-bar">
                        <div class="progress-bar__passed"></div><span class="progress-bar__item active"></span><span class="progress-bar__item"> </span><span class="progress-bar__item"> </span>
                    </div>
                    <form class="entering-block__form" action="{{route("recovery.letter")}}" method="post">
                        @csrf
                        <div class="field-wrapper">
                            <label for="form-email">Email</label>
                            <input type="email" id="form-email" name="email"/>
                        </div>
                        <div class="form-actions"><a class="underline-link" href="{{route("site.login")}}">Я вспомнил пароль</a>
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
