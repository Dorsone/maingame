@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="blog-page">
        <div class="container">
            <div class="back-link">
                <div class="line"></div><a href="{{ route('site.index') }}">Вернуться</a>
            </div>
            @include('gzone.partials.side-sticky')
            <div class="container-md2">
                <div class="account-info">
                    <div class="account-info-cover">
                        <!--<img src="./images/arena-main-bg.png" alt="">-->
                    </div>
                    <div class="account-info-desc">
                        <div class="account-info-avatar"></div>
                        <div class="account-info-name">
                            <p>{{ $user->name }}</p>
                            <div class="account-info-date">Играет с {{ $user->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="container-md1">
                    <h2 class="title-h2">Статьи автора</h2>
                    <div class="popular-articles__wrapper">
                        @foreach($articles as $article)
                            @include('gzone.partials.article-item', ['article' => $article, 'category' => $article->category])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('gzone.partials.footer')
@endsection
