@extends('site.layout')
@php
    /** @var $user \App\Models\User */
    /** @var $recommendation \App\Models\Articles [] */
    /** @var $category \App\Models\ArticlesCategories */
    /** @var $tags \App\Models\ArticlesTags [] */
@endphp

@section('title', $user->name)


@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    <section class="section">
        <div class="container container__sm">
            <div class="author-content">
                <div class="author-info">
                    @if($user->description)
                        <div class="author-info__block text">
                            <h3 class="title title-h3"> Об авторе</h3>
                            <p>{{ $user->description }}</p>
                        </div>
                    @endif
                    @if(is_array($user->interests) && ! empty($user->interests[0]['title']))
                        <div class="author-info__block">
                            <h3 class="title title-h3"> Интересы</h3>
                            @foreach($user->interests as $item)
                                @if(!empty($item['title']))
                                    <div class="interest">{{ $item['title'] }}</div>
                                @endif
                            @endforeach

                        </div>
                    @endif
                </div>
                <div class="author-avatar">
                    @if($user->image)
                        <div class="img-sm">
                            <img src="{{ asset($user->image) }}" alt=""/>
                        </div>
                    @endif
                    <h1 class="author-avatar__name">{{ $user->name }}</h1>
                    @if($user->created_at)
                        <div class="author-avatar__time">на сайте {!!  $user->how_long_ago !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container container__sm">
            <div class="title-line">
                <h2 class="title title-h2"> Статьи автора <span class="count">{{ $articles->total() }}</span></h2>
            </div>
            <div class="js-articles-wrap col-two">
                @foreach($articles as $article)
                    @include('site.inc.article-item', ['art' => $article, 'cat' => $article->category])
                @endforeach
            </div>
            <div class="js-link-more link-more" data-url="{{ $articles->nextPageUrl() }}">
                <svg class="icon icon-arrow-circle ">
                    <use xlink:href="/build/images/sprite-inline.svg#arrow-circle"></use>
                </svg>
                <span>Показь еще</span>
            </div>
        </div>
    </section>

@endsection
