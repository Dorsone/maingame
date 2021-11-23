@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection
@section('title', 'Поиск')

@section('content')
    <main class="search-results">
        <div class="tournaments-submenu-block">
            <div class="sticky-block">
                <div class="caption"><a href="javascript:void(0)">EASPORT NEWS</a></div>
                <!-- add class "current" to "a" tag to make active element-->
                <ul class="games-list">
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-counter-strike ">
                                <use xlink:href="./images/sprite-inline.svg#counter-strike"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-dota-2 ">
                                <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                            </svg></a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-mortal-kombat ">
                                <use xlink:href="./images/sprite-inline.svg#mortal-kombat"></use>
                            </svg></a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            @if(url()->previous())
                <div class="back-link">
                    <div class="line"></div>
                    <a href="{{ route('site.categories') }}">Вернуться</a>
                </div>
            @endif

            @if($articles)
                <div class="container-md2">
                    <div class="search-results__title">
                        <h1 class="title-h2">Что мы нашли по запросу {{ request()->query('q') }}</h1>
                    </div>
                </div>
                <section class="search-results__section">
                    <div class="container-md2">
                        <div class="container-md3">
                            <h2 class="title-h2">Турниры</h2>
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
                <section class="search-results__section">
                    <div class="container-md2">
                        <h2 class="title-h2">Статьи</h2>
                        <div class="latest-news">
                            @foreach($articles as $article)
                                <div class="article-preview">
                                    <div class="article-preview__img"><a href="javascript:void(0)"><img src="{{ asset($article->image) }}" alt=""/></a></div>
                                    <div class="article-preview__tags">
                                        @if($article->tags->isNotEmpty())
                                            <div class="hashtags">
                                                @foreach($article->tags as $tag)
                                                    <a href="javascript:void(0)" class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="article-preview__action bookmark">
                                            <svg class="icon icon-mark ">
                                                <use xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                            </svg>
                                        </div>
                                    </div><a class="article-preview__caption" href="javascript:void(0)">{{ $article->title }}</a>
                                    <div class="article-preview__info">
                                        <span class="article-preview__date">{{ $article->created_at->format('d M. Y') }}</span>
                                        @if($article->time_read)
                                            <span class="article-preview__reading">Читать {{ $article->time_read }} мин</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <div class="container-md2">
                    <div class="search-results__title">
                        <h1 class="title-h2">По этому запросу ничего не найдено</h1>
                    </div>
                </div>
            @endif
        </div>
        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection
