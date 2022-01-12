@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="media-page">
        @include('gzone.partials.side-sticky')

        <div class="top-articles">
            <div class="container-md2">
                @if(url()->previous())
                    <div class="back-link">
                        <div class="line"></div>
                        <a href="{{ route('site.categories') }}">Вернуться</a>
                    </div>
                @endif
                <div class="container-md2">
                    @include('gzone.partials.breadcrumbs')
                </div>
            </div>
            <div class="container-md2">
                <div class="popular-articles__wrapper">
                    @foreach($articles as $article)
                        @include('gzone.partials.article-item', ['articles' => $articles, 'withAuthor' => true, 'category' => $article->category])
                    @endforeach
                </div>
            </div>
        </div>




        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection

