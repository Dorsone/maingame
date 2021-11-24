@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="arena-page">
        <section class="arena-main">
            <div class="background-img"> <img src="{{ asset('images/arena-main-bg.png') }}" alt=""/>
            </div>
            <div class="container-sides-lg">
                @if(url()->previous())
                    <div class="back-link">
                        <div class="line"></div>
                        <a href="{{ route('site.categories') }}">Вернуться</a>
                    </div>
                @endif
                <div class="container-md3">
                    <div class="arena-main__content"><span class="tag">Турнирная платформа maingame</span>
                        <h1 class="title-h1">Играй, качай скилл и побеждай!</h1>
                        <p>Соревнуйся с 21,213 игроками в турнирах и готовься ворваться на про-сцену!</p>
                        <div class="actions-block">
                            <button class="button">Создать аккаунт</button><a class="button button_transp-hover" href="javascript:void(0)">Перейти к турнирам</a>
                        </div>
                    </div>
                    <aside class="section-aside">
                        <div class="section-aside__items">
                            <div class="section-aside__item">
                                <div class="media-one game-one">
                                    <div class="media-one__bg-img"><img src="{{ asset('images/image-1.jpg') }}" alt=""/>
                                    </div>
                                    <div class="media-one__desc">
                                        <svg class="icon icon-counter-strike ">
                                            <use xlink:href="./images/sprite-inline.svg#counter-strike"></use>
                                        </svg>
                                        <p class="media-one__caption">Counter-Strike: GO</p>
                                    </div><a href="javascript:void(0)"> </a>
                                </div>
                            </div>
                            <div class="section-aside__item">
                                <div class="media-one game-one">
                                    <div class="media-one__bg-img"><img src="./images/image-2.jpg" alt=""/>
                                    </div>
                                    <div class="media-one__desc">
                                        <svg class="icon icon-dota-2 ">
                                            <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                        </svg>
                                        <p class="media-one__caption">Dota 2</p>
                                    </div><a href="javascript:void(0)"> </a>
                                </div>
                            </div>
                            <div class="section-aside__item">
                                <div class="media-one game-one">
                                    <div class="media-one__bg-img"><img src="./images/image-3.jpg" alt=""/>
                                    </div>
                                    <div class="media-one__desc">
                                        <svg class="icon icon-mortal-kombat ">
                                            <use xlink:href="./images/sprite-inline.svg#mortal-kombat"></use>
                                        </svg>
                                        <p class="media-one__caption">Mortal Kombat</p>
                                    </div><a href="javascript:void(0)"> </a>
                                </div>
                            </div>
                            <div class="section-aside__item section-aside__item_show-md">
                                <div class="media-one media-one_coming game-one">
                                    <div class="hashtags"><a href="javascript:void(0)">#Next video</a></div>
                                    <p>Coming soon...</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        <section class="recommend-tourneys-section">
            <div class="container-sides-lg">
                <div class="container-md3">
                    <div class="recommend-tourneys__top">
                        <h2 class="title-h2">Рекомендуемые турниры</h2>
                        <p>Мы пересмотрели привычные подходы к созданию киберспортивных продуктов и создаём мир, где во главе угла — креатив, страсть и мастерство.</p>
                    </div>
                    <div class="recommend-tourneys__filters">
                        <button class="button-filter active">Все дисциплины</button>
                        <button class="button-filter">Сounter-Strike: Global Offensive</button>
                        <button class="button-filter">Dota 2</button>
                        <button class="button-filter">Mortal kombat 11</button>
                    </div>
                    <div class="recommend-tourney recommend-tourney_big">
                        <div class="recommend-tourney__icon"><img src="./images/image-5.jpg" alt=""/>
                        </div>
                        <div class="recommend-tourney__desc">
                            <div class="recommend-tourney__game">
                                <svg class="icon icon-dota-2 ">
                                    <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                </svg><span>Dota 2</span>
                            </div>
                            <p class="recommend-tourney__caption title-h2">WePlay Dota 2 дуэль Pudge #417 (EU)</p>
                            <p class="recommend-tourney__info">10 июля • 1v1 • 64 slots • Single elimination • $8.6 (Dota2 Скины)</p>
                            <button class="button">Участвовать в турнире</button>
                        </div>
                    </div>
                    <div class="recommend-tourneys__tournaments">
                        <div class="recommend-tourney">
                            <div class="recommend-tourney__icon"><img src="./images/image-6.jpg" alt=""/>
                            </div>
                            <div class="recommend-tourney__desc">
                                <div class="recommend-tourney__game">
                                    <svg class="icon icon-dota-2 ">
                                        <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                    </svg><span>Dota 2</span>
                                </div>
                                <p class="recommend-tourney__caption title-h3">WePlay Dota 2 дуэль Pudge #417 (EU)</p>
                                <p class="recommend-tourney__info">10 июля • 1v1 • 64 slots • Single elimination • $8.6 (Dota2 Скины)</p>
                                <button class="button">Участвовать в турнире</button>
                            </div>
                        </div>
                        <div class="recommend-tourney">
                            <div class="recommend-tourney__icon"><img src="./images/image-7.jpg" alt=""/>
                            </div>
                            <div class="recommend-tourney__desc">
                                <div class="recommend-tourney__game">
                                    <svg class="icon icon-dota-2 ">
                                        <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                    </svg><span>Dota 2</span>
                                </div>
                                <p class="recommend-tourney__caption title-h3">WePlay Dota 2 дуэль Pudge #417 (EU)</p>
                                <p class="recommend-tourney__info">10 июля • 1v1 • 64 slots • Single elimination • $8.6 (Dota2 Скины)</p>
                                <button class="button">Участвовать в турнире</button>
                            </div>
                        </div>
                        <div class="recommend-tourney">
                            <div class="recommend-tourney__icon"><img src="./images/image-8.jpg" alt=""/>
                            </div>
                            <div class="recommend-tourney__desc">
                                <div class="recommend-tourney__game">
                                    <svg class="icon icon-dota-2 ">
                                        <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                    </svg><span>Dota 2</span>
                                </div>
                                <p class="recommend-tourney__caption title-h3">WePlay Dota 2 дуэль Pudge #417 (EU)</p>
                                <p class="recommend-tourney__info">10 июля • 1v1 • 64 slots • Single elimination • $8.6 (Dota2 Скины)</p>
                                <button class="button">Участвовать в турнире</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="advantages-section">
            <div class="container-sides-lg">
                <div class="container-md3">
                    <h2 class="title-h2">Получи максимум от игры</h2>
                    <div class="advantages-block">
                        <div class="advantage-item">
                            <div class="advantage-item__img"><img src="./images/image-9.png" alt=""/>
                            </div>
                            <div class="advantage-item__desc advantage-item__desc_bottom">
                                <p class="advantage-item__caption title-h3">Быстрый старт</p>
                                <p class="advantage-item__text">Турниры по играм Dota 2, CS:GO и прочим дисциплинам. Просто регайся, выбирай игру и играй сам или с друзьями.</p>
                                <button class="button">Создать аккаунт</button>
                            </div>
                        </div>
                        <div class="advantage-item">
                            <div class="advantage-item__desc">
                                <p class="advantage-item__caption title-h3">Киберспортивные турниры в кармане</p>
                                <p class="advantage-item__text">Качай наше мобильное приложение и получай доступ к онлайн соревнованиям где бы ты ни был.</p>
                                <button class="button">Создать аккаунт</button>
                            </div>
                            <div class="advantage-item__img"><img src="./images/image-11.png" alt=""/>
                            </div>
                        </div>
                        <div class="advantage-item">
                            <div class="advantage-item__img advantage-item__img_center"><img src="./images/image-12.png" alt=""/>
                            </div>
                            <div class="advantage-item__desc">
                                <p class="advantage-item__caption title-h3">Админы всегда на связи</p>
                                <p class="advantage-item__text">Наши админы на одной волне с тобой – помогут решить технические проблемы и забанят злостного читера в твоем матче.</p>
                                <button class="button">Создать аккаунт</button>
                            </div>
                        </div>
                        <div class="advantage-item">
                            <div class="advantage-item__desc">
                                <p class="advantage-item__caption title-h3">Присоединяйся к нам в Discord</p>
                                <p class="advantage-item__text">Качай наше мобильное приложение и получай доступ к онлайн соревнованиям где бы ты ни был.</p>
                                <button class="button">Создать аккаунт</button>
                            </div>
                            <div class="advantage-item__img advantage-item__img_center"><img src="./images/image-13.png" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="ready-to-play">
                        <div class="ready-to-play__bg-img"><img src="./images/image-14.png" alt=""/>
                        </div>
                        <div class="ready-to-play__main">
                            <p class="ready-to-play__caption title-h3">Готов играть?</p>
                            <p class="ready-to-play__text">Соревнуйся с 21,213 игроками в турнирах и покажи, на что способен!</p>
                            <button class="button">Создать аккаунт</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="social">
            <ul class="social__links">
                <li><a href="https://youtube.com">
                        <svg class="icon icon-youtube ">
                            <use xlink:href="./images/sprite-inline.svg#youtube"></use>
                        </svg></a></li>
                <li><a href="https://google.com">
                        <svg class="icon icon-google ">
                            <use xlink:href="./images/sprite-inline.svg#google"></use>
                        </svg></a></li>
                <li><a href="https://discord.com">
                        <svg class="icon icon-discord ">
                            <use xlink:href="./images/sprite-inline.svg#discord"></use>
                        </svg></a></li>
                <li><a href="https://facebook.com">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="./images/sprite-inline.svg#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </main>
    @include('gzone.partials.footer')
@endsection
