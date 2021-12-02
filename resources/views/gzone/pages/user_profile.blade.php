@extends('gzone.layouts.main')

@section('title')
    {{$user->username}} - Profile
@endsection

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="account-page">
        @include('gzone.partials.side-sticky')
        <div class="container">
            <div class="back-link">
                <div class="line"></div><a href="{{route('site.index')}}">Вернуться</a>
            </div>
            <div class="container-md1">
                <div class="account-info">
                    <div class="account-info-actions">
                        <button class="account-info-btn" type="button">
                            <svg class="icon icon-edit ">
                                <use xlink:href="{{asset("./images/sprite-inline.svg#edit")}}"></use>
                            </svg>Редактировать профиль
                        </button>
                        <form action="{{route('profile.cover.store', auth()->user()->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <span class="account-info-btn">
                                <input accept=".jpg,.jpeg,.png" type="file" name="userCoverFile" onchange="this.form.submit()">
                                    <svg class="icon icon-image">
                                        <use xlink:href="{{asset("./images/sprite-inline.svg#image")}}"></use>
                                    </svg>Изменить обложку
                                </input>
                            </span>
                        </form>
                    </div>
                    <div class="account-info-cover">
                        @if (isset($media))
                            <img src="{{$media->getUrl()}}" alt="">
                        @endif
                    </div>
                    <div class="account-info-desc">
                        <div class="account-info-avatar"></div>
                        <div class="account-info-name">
                            <p>{{$user->username}}</p>
                            <div class="account-info-date">Играет с {{$user->created_at->format('d M Y')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="account-tabs">
            <div class="container">
                <div class="container-md1">
                    <h1 class="title-h3">Counter-Strike: Global Offensive</h1>
                    <div class="tournaments-block__tabs tabs">
                        <div class="tournaments-block__tabs-menu tabs-menu"><span class="tabs-menu-item current">Обзор</span><span class="tabs-menu-item">Команды</span><span class="tabs-menu-item">Турниры</span><span class="tabs-menu-item">Матчи</span></div>
                        <ul class="tabs-content">
                            <li class="current">
                                <div class="overview-block">
                                    <div class="overview-title">Дисциплина</div>
                                    <div class="overview-table">
                                        <div class="overview-line">
                                            <div class="overview-line-td">Матчей</div>
                                            <div class="overview-line-td">4</div>
                                        </div>
                                        <div class="overview-line">
                                            <div class="overview-line-td">Процент побед</div>
                                            <div class="overview-line-td">100%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overview-block">
                                    <div class="overview-title">Эффективность</div>
                                    <div class="overview-table">
                                        <div class="overview-line">
                                            <div class="overview-line-td">Карт сыграно</div>
                                            <div class="overview-line-td">N/A</div>
                                        </div>
                                        <div class="overview-line">
                                            <div class="overview-line-td">Раундов сыграно</div>
                                            <div class="overview-line-td">N/A</div>
                                        </div>
                                        <div class="overview-line">
                                            <div class="overview-line-td">Процент хедшотов</div>
                                            <div class="overview-line-td">N/A</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="team-wrap">
                                    <div class="team-block">
                                        <div class="team-info">
                                            <div class="team-info-picture"><img src="{{asset("./images/logo-icon.svg")}}" alt="">
                                            </div>
                                            <div class="team-info-name">Resistance</div>
                                            <div class="team-info-type">2v2</div>
                                        </div>
                                        <div class="team-count">2 участников</div>
                                        <div class="team-members">
                                            <div class="team-member"><img src="{{asset("./images/post-author-1.png")}}" alt="">
                                            </div>
                                            <div class="team-member"><img src="{{asset("./images/post-author-2.png")}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-block team-block--empty">
                                        <div class="team-info">
                                            <div class="team-info-picture"><img src="{{asset("./images/logo-icon.svg")}}" alt="">
                                            </div>
                                            <div class="team-info-name">Настроен играть серьезно?</div>
                                            <div class="team-info-type">5v5</div>
                                        </div>
                                        <div class="team-count">Создай свою команду для туриков 5v5 и <br>врывайся в киберспорт</div><a class="team-btn" href="javascript:void(0)">Создать команду 5v5</a>
                                        <div class="team-members">
                                            <div class="team-member team-member--empty"><img src="{{asset("./images/logo-icon.svg")}}" alt="">
                                            </div>
                                            <div class="team-member team-member--empty">
                                                <svg class="icon icon-icon ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>
                                                </svg>
                                            </div>
                                            <div class="team-member team-member--empty">
                                                <svg class="icon icon-icon ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>
                                                </svg>
                                            </div>
                                            <div class="team-member team-member--empty">
                                                <svg class="icon icon-icon ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>
                                                </svg>
                                            </div>
                                            <div class="team-member team-member--empty">
                                                <svg class="icon icon-icon ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <table class="tournaments-block__tournaments-table tournaments-table">
                                    <thead class="tournaments-table__header">
                                    <tr>
                                        <th>Название</th>
                                        <th>Время</th>
                                        <th>Режим</th>
                                        <th>Доступ</th>
                                        <th>Участники</th>
                                        <th>Призы</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tournaments-table__body">
                                    <tr class="tournament-card__block">
                                        <td class="tournament-card__column tournament-card__header">
                                            <div class="tournament-card__header-wrapper"><a class="tournament-card__logo" href="javascript:void(0)"><img src="{{asset("./images/cs-go-1.jpg")}}" alt=""></a>
                                                <div class="tournament-card__header-desc"><a class="tournament-card__title" href="javascript:void(0)">MainGame CS:GO 2v2 Classic #323 (EU)</a>
                                                    <div class="tournament-card__region">
                                                        <svg class="icon icon-globe ">
                                                            <use xlink:href="{{asset("./images/sprite-inline.svg#globe")}}"></use>
                                                        </svg><span>EU сервер</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Время</p>
                                            <p class="tournament-card__status tournament-card__status_completed">Завершен</p>
                                            <p class="tournament-card__date">26 июля 2021 - 15:00</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Режим</p>
                                            <p class="tournament-card__mode"><a href="javascript:void(0)">1v1</a></p>
                                            <p class="tournament-card__mode-text">Single elimination</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Доступ</p>
                                            <p class="tournament-card__acces-type">
                                                <svg class="icon icon-locked ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#locked")}}"></use>
                                                </svg>
                                            </p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Участники</p>
                                            <p class="tournament-card__participants">15/256</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__footer">
                                            <p class="tournament-card__column-title">Призы</p>
                                            <p class="tournament-card__award">$19 (Steam сертификаты)</p>
                                        </td>
                                    </tr>
                                    <tr class="tournament-card__block">
                                        <td class="tournament-card__column tournament-card__header">
                                            <div class="tournament-card__header-wrapper"><a class="tournament-card__logo" href="javascript:void(0)"><img src="{{asset("./images/cs-go-2.jpg")}}" alt=""></a>
                                                <div class="tournament-card__header-desc"><a class="tournament-card__title" href="javascript:void(0)">MainGame CS:GO 2v2 Classic #323 (EU)</a>
                                                    <div class="tournament-card__region">
                                                        <svg class="icon icon-globe ">
                                                            <use xlink:href="{{asset("./images/sprite-inline.svg#globe")}}"></use>
                                                        </svg><span>EU сервер</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Время</p>
                                            <p class="tournament-card__status tournament-card__status_canceled">Отменен</p>
                                            <p class="tournament-card__date">26 сентября 2021 - 15:00</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Режим</p>
                                            <p class="tournament-card__mode"><a href="javascript:void(0)">1v1</a></p>
                                            <p class="tournament-card__mode-text">Single elimination</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Доступ</p>
                                            <p class="tournament-card__acces-type">
                                                <svg class="icon icon-unlocked ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#unlocked")}}"></use>
                                                </svg>
                                            </p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__column_half">
                                            <p class="tournament-card__column-title">Участники</p>
                                            <p class="tournament-card__participants">256/256</p>
                                        </td>
                                        <td class="tournament-card__column tournament-card__footer">
                                            <p class="tournament-card__column-title">Призы</p>
                                            <p class="tournament-card__award">$200 000 (Steam сертификаты)</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li>
                                <!-- if empty tab-->
                                <!--<div class="account-tabs-empty">-->
                                <!--<svg class="icon icon-icon ">-->
                                <!--<use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>-->
                                <!--</svg>-->
                                <!--<div class="title-h3">Пока у тебя ноль сыгранных матчей</div><a class="account-tabs-empty-link" href="tournaments.html">Смотреть все турниры</a>-->
                                <!--</div>-->
                                <div class="account-tabs-empty">
                                    <svg class="icon icon-icon ">
                                        <use xlink:href="{{asset("./images/sprite-inline.svg#icon")}}"></use>
                                    </svg>
                                    <div class="title-h3">Пока у тебя ноль сыгранных матчей</div><a class="account-tabs-empty-link" href="{{asset("tournaments.html")}}">Смотреть все турниры</a>
                                </div>
                                <div class="match-table">
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--loose">Поражение</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--win">Победа</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--fail">Тех. поражение
                                            <svg class="icon icon-fail ">
                                                <use xlink:href="{{asset("./images/sprite-inline.svg#fail")}}"></use>
                                            </svg>
                                        </div>
                                        <div class="match-table-td match-table-td--deny">Матч отменен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">5v5</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--loose">Поражение</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--win">Победа</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--fail">Тех. поражение
                                            <svg class="icon icon-fail ">
                                                <use xlink:href="{{asset("./images/sprite-inline.svg#fail")}}"></use>
                                            </svg>
                                        </div>
                                        <div class="match-table-td match-table-td--deny">Матч отменен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">5v5</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--loose">Поражение</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--win">Победа</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--fail">Тех. поражение
                                            <svg class="icon icon-fail ">
                                                <use xlink:href="{{asset("./images/sprite-inline.svg#fail")}}"></use>
                                            </svg>
                                        </div>
                                        <div class="match-table-td match-table-td--deny">Матч отменен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">5v5</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--loose">Поражение</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--win">Победа</div>
                                        <div class="match-table-td match-table-td--finish">Матч завершен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">2v2</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                    <div class="match-table-tr">
                                        <div class="match-table-td">1:0</div>
                                        <div class="match-table-td match-table-td--fail">Тех. поражение
                                            <svg class="icon icon-fail ">
                                                <use xlink:href="{{asset("./images/sprite-inline.svg#fail")}}"></use>
                                            </svg>
                                        </div>
                                        <div class="match-table-td match-table-td--deny">Матч отменен</div>
                                        <div class="match-table-td">Турнир</div>
                                        <div class="match-table-td">5v5</div>
                                        <div class="match-table-td">de_inferno</div>
                                        <div class="match-table-td">29 июля 2021 14:00</div>
                                    </div>
                                </div>
                                <div class="pagination"><a class="pagination__prev" href="javascript:void(0)"></a><a class="pagination__item" href="javascript:void(0)">1</a><a class="pagination__item current" href="javascript:void(0)">2</a><a class="pagination__item" href="javascript:void(0)">3</a><a class="pagination__item" href="javascript:void(0)">4</a><a class="pagination__item pagination__item_dash" href="javascript:void(0)"></a><a class="pagination__item" href="javascript:void(0)">10</a><a class="pagination__next" href="javascript:void(0)"></a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection
