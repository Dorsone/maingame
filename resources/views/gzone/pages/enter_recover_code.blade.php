@extends('gzone.layouts.main')

@section('title', 'Восстановление пароля - ввести код')

@section('style')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
    </style>
@endsection

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
                    <form class="entering-block__form" action="{{route("check.recoverCode", $user->id)}}" method="post">
                        @csrf
                        <div class="field-wrapper field-wrapper-code">
                            <label for="form-code">Код</label>
                            <div class="field-wrapper-code-inputs">
                                <input type="number" class="confirm-code__input" autofocus id="form-code" placeholder="_" name="codes[]" />
                                <input type="number" class="confirm-code__input" placeholder="_" name="codes[]"/>
                                <input type="number" class="confirm-code__input" placeholder="_" name="codes[]"/>
                                <input type="number" class="confirm-code__input" placeholder="_" name="codes[]"/>
                            </div>
                            <p class="form-message">Код отправлен. Повторить запрос через <span id="seconds-counter">15</span> сек</p>
                            <p class="form-message" id="code-expired" hidden>Код устарел. <a class="underline-link" href="javascript:void(0)" onclick="resendCode()">Прислать код повторно</a></p>
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

@section("js")
    <script>
        $(".confirm-code__input").on('input',function(e) {
            let value = $(this).val();

            if (value.length >= 1) {
                $(this).val(value.slice(0, 1));
                // if ($(this).next().length === 0) {
                //     $('.entering-block__form').submit();
                // }
                $(this).next().focus();
            }
        });

        function resendCode() {
            window.location.reload();
        }

        var seconds = 15;
        var el = document.getElementById('seconds-counter');

        var cancel = setInterval(incrementSeconds, 1000);
        function incrementSeconds() {
            seconds -= 1;
            el.innerText = seconds;
            if (seconds == 0)
            {
                clearInterval(cancel);
                document.getElementById('code-expired').removeAttribute('hidden');
                seconds = 15;
                el.parentElement.setAttribute('hidden', "hidden");
            }
        }

    </script>
@endsection