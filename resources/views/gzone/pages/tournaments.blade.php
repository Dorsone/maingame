@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection
@section('title', 'Турниры')

@php($months = array(
    '01' => 'января', '02' => 'февраля', '03' => 'марта', '04' => 'апреля',
    '05' => 'мая', '06' => 'июня', '07' => 'июля', '08' => 'августа',
    '09' => 'сентября', '10' => 'октября', '11' => 'ноября', '12' => 'декабря'
))

@section('content')
    <main class="tournaments-page">
        <div class="container">
            <div class="back-link">
                <div class="line"></div>
                <a href="javascript:void(0)">Вернуться</a>
            </div>
            <div class="tournaments-submenu-block">
                <div class="sticky-block">
                    <ul class="games-list">
                        @foreach($games as $item)
                        <li>
                            <a href="{{route("tournament.index", $item->slug)}}" class="{{$game->slug == $item->slug ? 'current' : ''}}">
                                <svg class="icon icon-{{$item->slug}} ">
                                    <use xlink:href="{{asset("images/sprite-inline.svg#$item->slug")}}"></use>
                                </svg>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="tournaments-submenu">
                        <li><a href="javascript:void(0)">
                                {{--<!-- add class "active" to "a" tag with "premium" class to make active element-->
                                    <a class="premium active" href="javascript:void(0)">--}}
                                <svg class="icon icon-ticket-star ">
                                    <use xlink:href="{{asset("images/sprite-inline.svg#ticket-star")}}"></use>
                                </svg>
                            </a>
                        </li>
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-discord ">
                                    <use xlink:href="{{asset("images/sprite-inline.svg#discord")}}"></use>
                                </svg>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-message ">
                                    <use xlink:href="{{asset("images/sprite-inline.svg#message")}}"></use>
                                </svg>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-question ">
                                    <use xlink:href="{{asset("images/sprite-inline.svg#question")}}"></use>
                                </svg>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="container-md2">
                <div class="title-block">
                    <h1 class="title-h2">Турниры по {{$game->name}}</h1><a class="button" href="javascript:void(0)">
                        <svg class="icon icon-discord-btn ">
                            <use xlink:href="{{asset("images/sprite-inline.svg#discord-btn")}}"></use>
                        </svg>
                        <span>Перейти в Discord</span></a>
                </div>
                <div class="top-tournaments">
                    @foreach($top_tournaments as $top_tournament)
                    <div class="tournament-card"><a class="tournament-card__logo" href="javascript:void(0)"><img
                                    src="{{asset("images/cs-go-1.png")}}" alt=""/><span class="tournament-card__label">Топ</span></a><a
                                class="tournament-card__title title-h3" href="javascript:void(0)">{{$top_tournament->title}}</a>
                        <div class="tournament-card__region">
                            <svg class="icon icon-globe ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#globe")}}"></use>
                            </svg>
                            <span>EU сервер</span>
                        </div>
                        <div class="tournament-card__award">
                            <svg class="icon icon-gift ">
                                <use xlink:href="{{asset("images/sprite-inline.svg#gift")}}"></use>
                            </svg>
                            <span>{{$top_tournament->prize_amount}} ({{$top_tournament->prize_type}})</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tournaments-block">
                    <div class="tournaments-block__tabs tabs">
                        <div class="tournaments-block__tabs-menu tabs-menu">
                            <span class="tabs-menu-item current">Активные</span>
                            <span class="tabs-menu-item">Прошедшие</span>
                        </div>
                        <ul class="tabs-content">
                            <li class="current">
                                <div class="tournaments-block__filters">
                                    <div class="tournaments-block__select-block select-block">
                                        <button class="select-block__btn"><span>Все режимы</span>
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                        </button>
                                        <ul class="select-block__list">
                                            <li class="{{url()->full() == route("tournament.index", $game->slug) ? 'active' : ''}}">
                                                <a href="{{route("tournament.index", $game->slug)}}"><span>Все режимы</span></a>
                                            </li>
                                            @foreach($match_formats as $match_format)
                                            <li class="{{url()->full() == route("tournament.index", [$game->slug,'format' => $match_format->slug]) ? 'active' : ''}}">
                                                <a href="{{route("tournament.index", [$game->slug,'format' => $match_format->slug])}}"><span>{{$match_format->name}}</span></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tournaments-block__select-block select-block">
                                        <button class="select-block__btn"><span>Все статусы</span>
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                        </button>
                                        <ul class="select-block__list">
                                            <li class="active">
                                                <span>Все статусы</span>
                                            </li>
                                            <li>
                                                <span>Предстоящий</span>
                                            </li>
                                            <li>
                                                <span>Текущий</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tournaments-block__select-block select-block">
                                        <button class="select-block__btn"><span>Все слоты</span>
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                        </button>
                                        <ul class="select-block__list">
                                            <li class="active"><span>Все слоты</span></li>
                                            <li><span>Есть свободные</span></li>
                                        </ul>
                                    </div>
                                </div>
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
                                    @foreach($active_tournaments as $tournament)
                                        <tr class="tournament-card__block">
                                            <td class="tournament-card__column tournament-card__header">
                                                <div class="tournament-card__header-wrapper"><a
                                                            class="tournament-card__logo" href="javascript:void(0)"><img
                                                                src="{{asset("images/cs-go-1.png")}}" alt=""/></a>
                                                    <div class="tournament-card__header-desc"><a
                                                                class="tournament-card__title"
                                                                href="javascript:void(0)">{{$tournament->title}}</a>
                                                        <div class="tournament-card__region">
                                                            <svg class="icon icon-globe ">
                                                                <use xlink:href="{{asset("images/sprite-inline.svg#globe")}}"></use>
                                                            </svg>
                                                            <span>EU сервер</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Время</p>
                                                <p class="tournament-card__status tournament-card__status_current">
                                                    Текущий</p>
                                                @php($strtotime = strtotime($tournament->start_time))
                                                <p class="tournament-card__date">{{date("d", $strtotime)}} {{$months[date("m", $strtotime)]}} {{date("Y"), $strtotime}} - {{date("H:i", $strtotime)}}</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Режим</p>
                                                <p class="tournament-card__mode"><a
                                                            href="javascript:void(0)">{{$tournament->format->name}}</a>
                                                </p>
                                                <p class="tournament-card__mode-text">Single elimination</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Доступ</p>
                                                <div class="tournament-card__acces-type">
                                                    <svg class="icon icon-{{$tournament->is_private == true ? "locked" : "unlocked"}}">
                                                        <use xlink:href="{{asset("images/sprite-inline.svg#")}}{{$tournament->is_private == true ? "locked" : "unlocked"}}"></use>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Участники</p>
                                                <p class="tournament-card__participants">{{$tournament->teams_amount}}
                                                    /{{$tournament->teams_amount}}</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__footer">
                                                <p class="tournament-card__column-title">Призы</p>
                                                <p class="tournament-card__award">{{$tournament->prize_amount}}
                                                    ({{$tournament->prize_type}})</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <a class="pagination__prev" href="{{$active_tournaments->previousPageUrl()}}"></a>
                                    @for($i = 1; $i <= $active_tournaments->lastPage(); $i++)
                                        <a class="pagination__item {{$active_tournaments->currentPage() == $i ? 'current' : ''}}"
                                           href="{{$active_tournaments->url($i)}}">{{$i}}</a>
                                    @endfor
                                    <a class="pagination__next" href="{{$active_tournaments->nextPageUrl()}}"></a>
                                </div>
                            </li>
                            <li>
                                <div class="tournaments-block__filters">
                                    <div class="tournaments-block__select-block select-block">
                                        <button class="select-block__btn"><span>Все режимы</span>
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                        </button>
                                        <ul class="select-block__list">
                                            <li class="{{url()->full() == route("tournament.index", $game->slug) ? 'active' : ''}}">
                                                <a href="{{route("tournament.index", $game->slug)}}"><span>Все режимы</span></a>
                                            </li>
                                            @foreach($match_formats as $match_format)
                                                <li class="{{url()->full() == route("tournament.index", [$game->slug,'format' => $match_format->slug]) ? 'active' : ''}}">
                                                    <a href="{{route("tournament.index", [$game->slug,'format' => $match_format->slug])}}"><span>{{$match_format->name}}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tournaments-block__select-block select-block">
                                        <button class="select-block__btn"><span>Все статусы</span>
                                            <svg class="icon icon-arrow-down ">
                                                <use xlink:href="{{asset("images/sprite-inline.svg#arrow-down")}}"></use>
                                            </svg>
                                        </button>
                                        <ul class="select-block__list">
                                            <li class="active"><span>Все статусы</span></li>
                                            <li><span>Завершен</span></li>
                                            <li><span>Отменен</span></li>
                                        </ul>
                                    </div>
                                </div>
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
                                    @foreach($finished_tournaments as $tournament)
                                        <tr class="tournament-card__block">
                                            <td class="tournament-card__column tournament-card__header">
                                                <div class="tournament-card__header-wrapper"><a
                                                            class="tournament-card__logo" href="javascript:void(0)"><img
                                                                src="{{asset("images/cs-go-1.png")}}" alt=""/></a>
                                                    <div class="tournament-card__header-desc"><a
                                                                class="tournament-card__title"
                                                                href="javascript:void(0)">{{$tournament->title}}</a>
                                                        <div class="tournament-card__region">
                                                            <svg class="icon icon-globe ">
                                                                <use xlink:href="{{asset("images/sprite-inline.svg#globe")}}"></use>
                                                            </svg>
                                                            <span>EU сервер</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Время</p>
                                                <p class="tournament-card__status tournament-card__status_completed">
                                                    Завершен</p>
                                                @php($strtotime = strtotime($tournament->start_time))
                                                <p class="tournament-card__date">{{date("d", $strtotime)}} {{$months[date("m", $strtotime)]}} {{date("Y"), $strtotime}} - {{date("H:i", $strtotime)}}</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Режим</p>
                                                <p class="tournament-card__mode"><a
                                                            href="javascript:void(0)">{{$tournament->format->name}}</a>
                                                </p>
                                                <p class="tournament-card__mode-text">Single elimination</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Доступ</p>
                                                <div class="tournament-card__acces-type">
                                                    <svg class="icon icon-{{$tournament->is_private == true ? "locked" : "unlocked"}} ">
                                                        <use xlink:href="{{asset("images/sprite-inline.svg#")}}{{$tournament->is_private == true ? "locked" : "unlocked"}}"></use>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td class="tournament-card__column tournament-card__column_half">
                                                <p class="tournament-card__column-title">Участники</p>
                                                <p class="tournament-card__participants">
                                                    15/{{$tournament->teams_amount}}</p>
                                            </td>
                                            <td class="tournament-card__column tournament-card__footer">
                                                <p class="tournament-card__column-title">Призы</p>
                                                <p class="tournament-card__award">{{$tournament->prize_amount}}
                                                    ({{$tournament->prize_type}})</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    <a class="pagination__prev" href="{{$finished_tournaments->previousPageUrl()}}"></a>
                                    @for($i = 1; $i <= $finished_tournaments->lastPage(); $i++)
                                        <a class="pagination__item {{$finished_tournaments->currentPage() == $i ? 'current' : ''}}"
                                           href="{{$finished_tournaments->url($i)}}">{{$i}}</a>
                                    @endfor
                                    <a class="pagination__next" href="{{$finished_tournaments->nextPageUrl()}}"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content-text">
                    <div class="tournaments-seo">
                        <div class="tournaments-seo__text">
                            <h2 class="title-h3">Турниры по {{$game->name}}</h2>
                            <p>Counter-Strike: Global Offensive - это один из самых известных и популярных шутеров в
                                мире. Миллионы людей ежедневно садятся за свои компьютеры, чтобы вновь ворваться в мир
                                сражений, адреналина, испытать чувство победы над противником. Это не просто видеоигра,
                                это часть киберспорта, который давно занял свою нишу среди остальных видов
                                развлечений.</p>
                            <p>Из любительских турниров, которые мы все хорошо помним из прошлого, киберспорт
                                эволюционировал в полноценное зрелищное шоу. Теперь это большие чемпионаты, в том числе
                                международные, соревнования, за которыми следит весь мир. Неудивительно, что многие
                                хотят попасть в этот вид спорта и стать частью истории, участвовать в турнирах, которые
                                собирают огромные стадионы. Не все знают, с чего начать, но решение есть всегда.</p>
                            <p>Как попасть в киберспорт? Все просто! Нужно начинать улучшать свои навыки игры. Чтобы это
                                сделать, стоит начать с чего-то малого, например, с турниров по CS:GO для новичков. Со
                                старта не обязательно иметь свою команду из пяти человек, ведь индивидуальный скилл
                                тренируется в любом случае.</p>
                            <p>Помимо обычной практики в матчмейкинге иногда нужно пробовать себя в соревновательных
                                баталиях. В них царят совсем другие эмоции, а возможность получить награду меняет подход
                                к игре в корне.</p>
                            <p>Самыми популярными считаются онлайн турниры, и для этого у нас есть особенная платформа.
                                Команда WePlay! Esports подготовила серию еженедельных турниров по КС ГО для всех
                                желающих окунуться в мир контер страйк, в том числе для начинающих. Здесь есть
                                возможность посоревноваться с другими игроками в любом удобном формате, а также завести
                                новые знакомства, обсудить проблемы CS:GO и даже найти себе команду.</p>
                            <p>Бесплатные турниры для новичков - это отличный способ приобрести навыки игры в
                                Counter-Strike, а также подготовиться к соревнованиям с более сильными соперниками.</p>
                            <p class="title-h3">Кто может участвовать в турнирах по CS:GO?</p>
                            <p>Участвовать может любой желающий, достаточно зарегистрироваться на сайте и привязать ваш
                                Steam аккаунт с игрой к профилю. Также, у вас должен быть prime статус в CS:GO - т.е. вы
                                должны были приобрести CS:GO, либо достичь 21го уровня профиля в игре.</p>
                            <p class="title-h3">Какие призы за победу в турнире CS:GO?</p>
                            <p>Участники, занявшие призовые места, получают Steam сертификаты. Более подробная
                                информация указана на странице каждого отдельного турнира.</p>
                            <p class="title-h3">Какие есть режимы? Могу ли я участвовать один, или с другом /
                                командой?</p>
                            <p>Да, у нас есть турниры в форматах 1v1, 2v2 и 5v5, так что каждый сможет найти и
                                попробовать себя в наиболее подходящем.</p>
                            <p class="title-h3">Как часто проводятся турниры?</p>
                            <p>Турниры проходят на ежедневной основе с разным периодом старта, так что любой участник
                                найдет для себя наиболее удобный по времени.</p>
                        </div>
                        <button class="tournaments-seo__btn"><span class="show">Показать</span><span
                                    class="hide">Скрыть</span>
                            <svg class="icon icon-arrow-down ">
                                <use xlink:href="./images/sprite-inline.svg#arrow-down"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="social">
            <ul class="social__links">
                <li><a href="https://youtube.com">
                        <svg class="icon icon-youtube ">
                            <use xlink:href="./images/sprite-inline.svg#youtube"></use>
                        </svg>
                    </a></li>
                <li><a href="https://google.com">
                        <svg class="icon icon-google ">
                            <use xlink:href="./images/sprite-inline.svg#google"></use>
                        </svg>
                    </a></li>
                <li><a href="https://discord.com">
                        <svg class="icon icon-discord ">
                            <use xlink:href="./images/sprite-inline.svg#discord"></use>
                        </svg>
                    </a></li>
                <li><a href="https://facebook.com">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="./images/sprite-inline.svg#facebook"></use>
                        </svg>
                    </a></li>
            </ul>
        </div>
    </main>
    @include('gzone.partials.footer')
@endsection