@extends('site.layout')
@php
    /** @var $articles \App\Models\Articles [] */
@endphp

@section('title', 'Поиск')


@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    <section class="section">
        <div class="container container__sm">
            <div class="search-block">
                <div class="title-line">
                    <h1 class="title title-h1"> Поиск</h1>
                </div>
                <form method="get" class="form form-line" action="{{ route('site.search') }}">
                    <input name="q" value="{{ request()->query('q') ?? "" }}" type="text" placeholder="Поиск по сайту"/>
                    <button>
                        <svg class="icon icon-search ">
                            <use xlink:href="/build/images/sprite-inline.svg#search"></use>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="search-result">
                <h3 class="title title-h3"> {{ count($articles) }} Результата по запросу «{{ request()->query('q') }}» </h3>
                @foreach($articles as $article)
                    @include('site.inc.article-item', ['art' => $article, 'cat' => $article->category])
                @endforeach

            </div>
        </div>
    </section>
@endsection
