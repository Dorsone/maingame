@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="media-page">
        <div class="tournaments-submenu-block">
            <div class="sticky-block">
                <div class="caption"><a href="javascript:void(0)">EASPORT NEWS</a></div>
                <!-- add class "current" to "a" tag to make active element-->
                <ul class="games-list">
                    <li><a href="{{ route('site.category', ['categorySlug' => 'cs-go']) }}">
                            <svg class="icon icon-counter-strike ">
                                <use xlink:href="./images/sprite-inline.svg#counter-strike"></use>
                            </svg>
                        </a></li>
                    <li><a href="{{ route('site.category', ['categorySlug' => 'dota']) }}">
                            <svg class="icon icon-dota-2 ">
                                <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                            </svg>
                        </a></li>
                    <li><a href="javascript:void(0)">
                            <svg class="icon icon-mortal-kombat ">
                                <use xlink:href="./images/sprite-inline.svg#mortal-kombat"></use>
                            </svg>
                        </a></li>
                </ul>
            </div>
        </div>

        @foreach($categories as $key => $category)
            @switch($key)
                @case(0)
                    @include('gzone.partials.top-articles', ['category' => $category])
                    <div class="container">
                    <div class="container-md2">
                        <div class="event-banner">
                            <div class="event-banner__content">
                                <div class="event-banner__bg"><img src="./images/image-19.png" alt=""/>
                                </div>
                                <div class="event-banner__desc">
                                    <p class="event-banner__caption title-h3">Врывайся в киберспорт</p>
                                    <p class="event-banner__text">Участвуй в призовых турнирах по CS:GO, Dota 2, Dota Underlords
                                        и TFT</p>
                                    <button class="button">Играть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @case(1)
                    @include('gzone.partials.popular-articles', ['category' => $category])
                @break
                @case(2)
                    @include('gzone.partials.news-feed', ['category' => $category])
                @break
            @endswitch
        @endforeach

        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection
