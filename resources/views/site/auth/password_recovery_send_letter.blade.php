@extends("site.auth.layout")

@section('title', "Восстановление пароля - отправка письма")

@section("content")
<div class="entering-block__main">
    <p class="entering-block__title">Забыл пароль</p>
    <p class="entering-block__subtitle">Напишите email и мы вышлем вам код для входа</p>
    <div class="progress-bar">
        <div class="progress-bar__passed"></div><span class="progress-bar__item active"></span><span class="progress-bar__item"> </span><span class="progress-bar__item"> </span>
    </div>
    <form class="entering-block__form" action="{{route("registration.letter")}}" method="post">
        @csrf
        <div class="field-wrapper">
            <label for="form-email">Email</label>
            <input type="email" id="form-email" name="email"/>
        </div>
        <div class="form-actions"><a class="underline-link" href="{{route("site.entrance")}}">Я вспомнил пароль</a>
            <button class="button" type="submit">Далее</button>
        </div>
    </form>
</div>
@endsection