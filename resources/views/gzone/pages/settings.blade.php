@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
<main class="account-page">
    <div class="container">
        <div class="back-link">
            <div class="line"></div><a href="javascript:void(0)">Вернуться</a>
        </div>
        <div class="tournaments-submenu-block">
            <div class="sticky-block">
                <!-- add class "current" to "a" tag to make active element-->
                <ul class="games-list">
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-counter-strike ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#counter-strike")}}"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-dota-2 ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#dota-2")}}"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-mortal-kombat ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#mortal-kombat")}}"></use>
                            </svg></a></li>
                </ul>
                <ul class="tournaments-submenu">
                    <li>
                        <!-- add class "active" to "a" tag with "premium" class to make active element-->
{{--                        <a class="premium active" href="javascript:void(0)">--}}
                        <a href="javascript:void(0)">
                            <svg class="icon icon-ticket-star ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#ticket-star")}}"></use>
                            </svg></a>
                    </li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-discord ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#discord")}}"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-message ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#message")}}"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-question ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#question")}}"></use>
                            </svg></a></li>
                </ul>
            </div>
        </div>
        <div class="container-md1">
            @include('gzone.partials.account-info')
        </div>
    </div>
    <section>
        <div class="container">
            <div class="container-md1">
                <div class="account-main">
                    @include('gzone.partials.account-menu')
                    <div class="account-content">
                        <div class="account-title-block">
                            <h1 class="title-h3">Настройки аккаунта</h1>
                        </div>
                        <div class="profile-form-data-wrap">
                            <form class="profile-form profile-form--data" action="{{route("profile.update", $user->id)}}" method="post" id="update-form">
                                @csrf
                                <div class="profile-form-2-col-block">
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label" for="username">Ник</label>
                                        <input class="profile-form-input" type="text" name="username" id="username" value="{{$user->username}}" placeholder="Nik22"/>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <div class="profile-form-label-wrap">
                                            <label class="profile-form-label" for="email">Эл. адрес</label>
                                            <a class="hov-underline-link" href="javascript:">Изменить почту</a>
                                        </div>
                                        <input class="profile-form-input" type="email" id="email" name="email" value="{{$user->email}}" placeholder="Nik@gmail.com"/>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label" for="first_name">Имя</label>
                                        <input class="profile-form-input" type="text" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="Николай"/>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label" for="surname">Фамилия</label>
                                        <input class="profile-form-input" type="text" id="surname" name="surname" value="{{$user->surname}}" placeholder="Николаев"/>
                                    </div>
                                </div>
                                <div class="profile-form-3-col-block">
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label">Пол</label>
                                        <div class="__select" data-state="">
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                            <div class="__select__title"></div>
                                            <div class="__select__content">
                                                <input class="__select__input" type="radio" name="gender" value="male" id="male-gender" {{$user->gender != "male" ?: "checked"}}/>
                                                <label class="__select__label" for="male-gender">Мужской</label>
                                                <input class="__select__input" type="radio" name="gender" value="female" id="female-gender" {{$user->gender != "female" ?: "checked"}}/>
                                                <label class="__select__label" for="female-gender">Женский</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label">Дата рождения</label>
                                        <div class="profile-form-input-wrap">
                                            <input class="profile-form-input calendar" type="text" name="birth_date" value="{{$user->birth_date}}" readonly="readonly"/>
                                            <svg class="icon icon-calendar1 ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#calendar1")}}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label">Страна</label>
                                        <div class="__select" data-state="">
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                            <div class="__select__title"></div>
                                            <div class="__select__content">
                                                @foreach($countries as $country)
                                                <input class="__select__input" type="radio" name="country" id="{{$country->code}}"
                                                        value="{{$country->code}}" {{$user->country == $country->code ? "checked" : ""}}/>
                                                <label class="__select__label" for="{{$country->code}}">{{$country->name}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button" onclick="document.getElementById('update-form').submit()">Сохранить изменения</div>
                                    <p class="info-text">Вы можете изменить выбранную страну, пол или день рождения только через нашу <a class="hov-underline-link" href="javascript:void(0)">службу поддержки</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="account-settings-block account-settings-block--file-load">
                            <p class="account-settings-title">Загрузить документы</p>
                            <p class="account-settings-subtitle">Хорошо, серьезная часть. Чтобы играть в наших турнирах с ограниченным доступом, добавьте свои документы.</p>
                            <!-- if document file has been loaded-->
                            @foreach($documents as $document)
                            <div class="account-settings-document-block" id="document-{{$document->id}}">
                                <div class="account-settings-document-item">
                                    <div class="account-settings-document-icon">
                                        <svg class="icon icon-file-blank">
                                            <use xlink:href="{{asset("images/sprite-inline.svg#file-blank")}}"></use>
                                        </svg>
                                    </div>
                                    <p class="account-settings-document-label">{{$document->file_name}}</p>
                                    <button class="account-settings-document-btn" onclick="deleteFile({{$document->id}})">Удалить</button>
                                </div>
                            </div>
                            @endforeach
                            <!-- /if document file has been loaded-->
                            <div class="account-settings-file-loading" id="upload-file">
                                <p>Добавляйте файлы в форматах JPG, PNG, размером до 4 Мб и максимальным разрешением 2000px x 2000px</p>
                                <form class="profile-form-file-loading" id="form-document" action="{{route("profile.add.file")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="add-foto" name="document"/>
                                    <label class="button_transp-hover" for="add-foto">Загрузить файлы</label>
                                </form>
                            </div>
                        </div>
                        <div class="account-settings-block">
                            <p class="account-settings-title">Изменить пароль</p>
                            <form class="profile-form profile-form-pwd-changing" method="post" action="{{route("profile.change.password")}}">
                                @csrf
                                @method("PUT")
                                <div class="profile-form-2-col-block">
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label" for="pwd">Новый пароль</label>
                                        <div class="profile-form-input-wrap">
                                            <input class="profile-form-input enter-pass" type="password" id="pwd" name="password" placeholder="Придумайте пароль"/>
                                            <div class="eye" data-action="see-password" data-toggle="enter-pass"></div>
                                        </div>
                                    </div>
                                    <div class="profile-form-field-wrap">
                                        <label class="profile-form-label" for="pwd-repeat">Подтвердите пароль</label>
                                        <div class="profile-form-input-wrap">
                                            <input class="profile-form-input enter-pass" type="password" id="pwd-repeat" name="password_confirmation" placeholder="Повторите пароль"/>
                                            <div class="eye" data-action="see-password" data-toggle="enter-pass"></div>
                                        </div>
                                    </div>
                                    <button class="button" type="submit">Сохранить пароль</button>
                                </div>
                            </form>
                        </div>
                        <div class="account-settings-block account-settings-block--account-del">
                            <p class="account-settings-title">Удалить аккаунт</p>
                            <p class="account-settings-subtitle">Вы навсегда удалите свои данные, и это действие нельзя будет отменить.</p>
                            <form action="{{route("profile.delete")}}" method="post">
                                @csrf
                                @method("DELETE")
                            <button class="button button_red" type="submit">Удалить аккаунт</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="social">
        <ul class="social__links">
            <li><a href="https://youtube.com">
                    <svg class="icon icon-youtube ">
                        <use xlink:href="{{asset("images/sprite-inline.svg#youtube")}}"></use>
                    </svg></a></li>
            <li><a href="https://google.com">
                    <svg class="icon icon-google ">
                        <use xlink:href="{{asset("images/sprite-inline.svg#google")}}"></use>
                    </svg></a></li>
            <li><a href="https://discord.com">
                    <svg class="icon icon-discord ">
                        <use xlink:href="{{asset("images/sprite-inline.svg#discord")}}"></use>
                    </svg></a></li>
            <li><a href="https://facebook.com">
                    <svg class="icon icon-facebook ">
                        <use xlink:href="{{asset("images/sprite-inline.svg#facebook")}}"></use>
                    </svg></a></li>
        </ul>
    </div>
</main>
@include('gzone.partials.footer')
@endsection

@section('js')
    <script src="{{asset("assets/js/new-document.js")}}"></script>
    <script>
        document.getElementById("add-foto").onchange = function() {
            var formData = new FormData(document.getElementById("form-document"));
            $.ajax({
                method: 'POST',
                url: `${window.location.origin}/user/file`,
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (response) {
                    var file = addFile(response);
                    $("#upload-file").before(file);
                }
            })
        };

        function deleteFile(document_id) {
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                method: 'DELETE',
                url: `${window.location.origin}/user/file/delete/${document_id}`,
                data: {
                    _token: token,
                },
                success: function () {
                    $(`#document-${document_id}`).remove();
                }
            })
        }
    </script>
@endsection
