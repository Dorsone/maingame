@extends('site.layout')
@php
    /** @var $tag \App\Models\ArticlesTags */
    /** @var $articles \App\Models\Articles [] */
@endphp

@section('title', 'Статьи по тегу '.$tag->name)
@section('description', '')
@section('keywords', '')

@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    <section class="section">
        <div class="container">
            <div class="container__sm">
                <div class="text">
                    <h2>Статьи по тегу #{{ $tag->name }}</h2>
                    <p></p>
                </div>
            </div>

            <div class="sort">
                <svg class="icon icon-sort ">
                    <use xlink:href="/build/images/sprite-inline.svg#sort"></use>
                </svg>
                <div class="sort-selected" data-col="date" data-sort="desc">Сначала новые</div>
                <div class="sort-arrow"></div>
                <div class="sort-list">
                    <span data-col="time_read" data-sort="asc">Сначала короткие</span>
                    <span data-col="time_read" data-sort="desc">Сначала длинные</span>
                    <span data-col="date" data-sort="desc">Сначала новые</span>
                    <span data-col="views" data-sort="desc">Сначала популярные</span>
                </div>
            </div>

            <div class="js-articles-wrap col-three col-three__wrap">
                @foreach($articles as $art)
                    @include('site.inc.article-item', ['art' => $art, 'cat' => $art->category])
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
