@extends('site.layout')

@php /** @var $categories \App\Models\ArticlesCategories [] */ @endphp

@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    @foreach($categories as $cat)
        <section class="section">
            <div class="container">
                <div class="title-line title-line__center">
                    <div class="img-sm">
                        <img src="{{ asset($cat->image) }}" alt=""/>
                    </div>
                    <div class="title title-h2"> {{ $cat->title }}</div>
                    <a class="link-arrow" href="{{ route('site.category', ['categorySlug' => $cat->slug]) }}">
                        <span>Больше в категории</span>
                        <svg class="icon icon-arrow ">
                            <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                        </svg>
                    </a>
                </div>
                <div class="col-three col-three__scroll">
                    @foreach($cat->articles->take(3) as $art)
                        @include('site.inc.article-item', ['art' => $art])
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

@endsection
