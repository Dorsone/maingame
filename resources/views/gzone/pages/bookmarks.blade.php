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
                <div class="account-info">
                    <div class="account-info-actions">
                        <button class="account-info-btn" type="button">
                            <svg class="icon icon-edit ">
                                <use xlink:href="{{asset("./images/sprite-inline.svg#edit")}}"></use>
                            </svg>Редактировать профиль
                        </button>
                        <button class="account-info-btn" type="button">
                            <svg class="icon icon-image ">
                                <use xlink:href="{{asset("./images/sprite-inline.svg#image")}}"></use>
                            </svg>Изменить обложку
                        </button>
                    </div>
                    <div class="account-info-cover">
                        <!--<img src="./images/arena-main-bg.png" alt="">-->
                    </div>
                    <div class="account-info-desc">
                        <div class="account-info-avatar"></div>
                        <div class="account-info-name">
                            <p>Mirror111</p>
                            <div class="account-info-date">Играет с 21 июля 2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="container-md1">
                    <div class="account-main">
                        @include('gzone.partials.account-menu')
                        <div class="account-content">
                            <div class="account-title-block">
                                <h1 class="title-h3">Мои закладки</h1>
                                <form class="account-search-form" action="#">
                                    <button>
                                        <svg class="icon icon-search ">
                                            <use xlink:href="{{asset("./images/sprite-inline.svg#search")}}"></use>
                                        </svg>
                                    </button>
                                    <input type="text" placeholder="Что-то ищешь?">
                                </form>
                            </div>
                            @if(count($bookmarks) != 0)
                                <div class="account-my-bookmarks">
                                    @foreach($bookmarks as $bookmark)
                                            <div class="article-preview">
                                                <form method="POST" action="{{route('profile.bookmark.delete', $bookmark->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bookmark-remove-btn">
                                                        <svg class="icon icon-close1 ">
                                                            <use xlink:href="{{asset("./images/sprite-inline.svg#close1")}}"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <div class="article-preview__img">
                                                    <a href="{{route('site.article', ['categorySlug' => $bookmark->category->slug, 'articleSlug' => $bookmark->slug])}}">
                                                        <img src="{{asset($bookmark->image)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="article-preview__tags">
                                                    <div class="hashtags">
                                                        @foreach($bookmark->tags as $tag)
                                                            <a href="{{route('site.articles-by-tag', ['tagSlug' => $tag->slug])}}">#{{$tag->name}}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <a class="article-preview__caption" href="{{route('site.article', ['categorySlug' => $bookmark->category->slug, 'articleSlug' => $bookmark->slug])}}">{{$bookmark->title}}</a>
                                                <p class="article-preview__text">{{$bookmark->content_preview}}</p>
                                                <div class="article-preview__info">
                                                    <div class="article-preview__author">
                                                        <div class="article-preview__author-img"><img src="{{asset($bookmark->user->image)}}" alt="">
                                                        </div><a class="article-preview__author-name" href="{{route('profile.index', $bookmark->user->id)}}">
                                                            {{$bookmark->user->username}}
                                                        </a>
                                                    </div><span class="article-preview__reading">Читать {{$bookmark->time_read}} мин</span>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            @endif
                            @if (count($bookmarks) == 0)
                                <div class="account-my-bookmarks-empty">
                                    <svg class="icon icon-bookmark ">
                                        <use xlink:href="{{asset("./images/sprite-inline.svg#bookmark")}}"></use>
                                    </svg>
                                    <p class="title-h3">Сохраняй сюда интересные статьи «на потом»</p>
                                    <p>Кликай на иконку закладок возле статей, чтобы они появились в этом разделе</p>
                                </div>
                            @endif
                            <div class="account-latest-news">
                                <p class="title-h3">Последние новости</p>
                                <div class="latest-news">
                                    @foreach($articles as $article)
                                        <div class="article-preview">
                                            <div class="article-preview__img">
                                                <a href="{{route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug])}}">
                                                    <img src="{{asset($article->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="article-preview__tags">
                                                <div class="hashtags">
                                                    @foreach($article->tags as $tag)
                                                        <a href="{{route('site.articles-by-tag', ['tagSlug' => $tag->slug])}}">#{{$tag->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <a class="article-preview__caption" href="{{route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug])}}">{{$article->title}}</a>
                                            <div class="article-preview__info">
                                                <div class="article-preview__author">
                                                    <div class="article-preview__author-img"><img src="{{asset($article->user->image)}}" alt="">
                                                    </div><a class="article-preview__author-name" href="{{route('profile.index', $article->user->id)}}">
                                                        {{$article->user->username}}
                                                    </a>
                                                </div><span class="article-preview__reading">Читать {{$article->time_read}} мин</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
