@extends('gzone.layouts.main')

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
                                <h1 class="title-h3">История просмотров</h1>
                                <form class="account-search-form" action="#">
                                    <button>
                                        <svg class="icon icon-search ">
                                            <use xlink:href="{{asset("./images/sprite-inline.svg#search")}}"></use>
                                        </svg>
                                    </button>
                                    <input type="text" placeholder="Что-то ищешь?">
                                </form>
                            </div>
                            <div class="account-my-bookmarks">
                                @foreach($histories as $history)
                                    <div class="article-preview">
                                        <form method="POST" action="{{route('profile.history.delete', $history->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bookmark-remove-btn">
                                                <svg class="icon icon-close1 ">
                                                    <use xlink:href="{{asset("./images/sprite-inline.svg#close1")}}"></use>
                                                </svg>
                                            </button>
                                        </form>
                                        <div class="article-preview__img">
                                            <a href="{{route('site.article', ['categorySlug' => $history->category->slug, 'articleSlug' => $history->slug])}}">
                                                <img src="{{asset($history->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="article-preview__tags">
                                            <div class="hashtags">
                                                @foreach($history->tags as $tag)
                                                    <a href="{{route('site.articles-by-tag', ['tagSlug' => $tag->slug])}}">#{{$tag->name}}</a>
                                                @endforeach
                                            </div>
                                        </div><a class="article-preview__caption" href="{{route('site.article', ['categorySlug' => $history->category->slug, 'articleSlug' => $history->slug])}}">{{$history->title}}</a>
                                        <p class="article-preview__text">{{$history->content_preview}}</p>
                                        <div class="article-preview__info">
                                            <div class="article-preview__author">
                                                <div class="article-preview__author-img"><img src="{{asset($history->user->image)}}" alt="">
                                                </div><a class="article-preview__author-name" href="{{route('profile.index', $history->user->id)}}">
                                                    {{$history->user->username}}
                                                </a>
                                            </div><span class="article-preview__reading">Читать {{$history->time_read}} мин</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection
