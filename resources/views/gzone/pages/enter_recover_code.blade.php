@extends('gzone.layouts.main')

@section('content')
    <main class="authorization">
        <div class="authorization__wrapper">
            <div class="authorization__entering-block entering-block"><a class="entering-block__logo" href="{{route("site.index")}}"><img src="{{asset("images/logo.svg")}}" alt=""/></a>
                <div class="entering-block__main">
                    <p class="entering-block__title">Забыл пароль</p>
                    <p class="entering-block__subtitle">Мы прислали код на почту. Вставьте его ниже</p>
                    <div class="progress-bar">
                        <div class="progress-bar__passed progress-bar__passed_50"></div><span class="progress-bar__item active"></span><span class="progress-bar__item active"></span><span class="progress-bar__item"> </span>
                    </div>
                    <form class="entering-block__form" action="#">
                        @csrf
                        <div class="field-wrapper field-wrapper-code">
                            <label for="form-code">Код</label>
                            <div class="field-wrapper-code-inputs">
                                <input type="number" id="form-code" placeholder="_"/>
                                <input type="number" placeholder="_"/>
                                <input type="number" placeholder="_"/>
                                <input type="number" placeholder="_"/>
                            </div>
                            <p class="form-message">Код отправлен. Повторить запрос через 15 сек</p>
                        </div>
                        <div class="form-actions"><a class="button button_transp-hover" href="javascript:void(0)">Назад</a>
                            <button class="button">Далее</button>
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