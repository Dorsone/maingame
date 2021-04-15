@extends('site.layout')
@php
    /** @var $category \App\Models\ArticlesCategories */
    /** @var $tags \App\Models\ArticlesTags [] */
@endphp

@section('title', $category->seo_title ?? $category->title)
@section('description', $category->seo_description)
@section('keywords', $category->seo_keywords)

@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    <section class="section">
        <div class="container">
            <div class="container__sm">
                <div class="text">
                    <h2>{{ $category->seo_h1 ?? $category->title }}</h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>

            @if($tags->isNotEmpty())
                <div class="tag-block">
                    <div class="tag-block__title">
                        <div class="title title-h4"> Хештеги</div>
                        <div class="tag-remove">
                            <svg class="icon icon-close ">
                                <use xlink:href="./images/sprite-inline.svg#close"></use>
                            </svg>
                            <span>Сбросить</span>
                        </div>
                    </div>

                    @foreach($tags as $tag)
                        <div class="tag" data-tag="{{ $tag->slug }}">#{{ $tag->name }}</div>
                    @endforeach
                    <div class="tag-more">+ Еще <span></span></div>
                </div>
            @endif

            <div class="sort">
                <svg class="icon icon-sort ">
                    <use xlink:href="/build/images/sprite-inline.svg#sort"></use>
                </svg>
                <div class="sort-selected">Короткие статьи</div>
                <div class="sort-arrow"></div>
                <div class="sort-list">
                    <span>Сначала короткие</span>
                    <span>Сначала длинные</span>
                    <span>Сначала новые</span>
                    <span>Сначала популярные</span>
                </div>
            </div>

            <div class="col-three col-three__wrap">
                @foreach($articles as $art)
                    @include('site.inc.article-item', ['art' => $art, 'cat' => $category])
                @endforeach
            </div>
            <div class="link-more" data-url="{{ $articles->nextPageUrl() }}">
                <svg class="icon icon-arrow-circle ">
                    <use xlink:href="/build/images/sprite-inline.svg#arrow-circle"></use>
                </svg>
                <span>Показь еще</span>
            </div>
        </div>
    </section>

    @if($category->seo_text)
        <section class="section">
            <div class="container">
                <div class="container__md">
                    <div class="text">{!! $category->seo_text !!}</div>
                </div>
            </div>
        </section>
    @endif

@endsection
