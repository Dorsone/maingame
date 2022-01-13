@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection
@section('title', $user->name)

@section('content')
    <main class="blog-page">
        <div class="container">
            @if(url()->previous())
                <div class="back-link">
                    <div class="line"></div>
                    <a href="{{ route('site.categories') }}">Вернуться</a>
                </div>
            @endif
            @include('gzone.partials.side-sticky')
            <div class="container-md2">
                @include('gzone.partials.account-info')
            </div>
        </div>
        <section>
            <div class="container">
                <div class="container-md2">
                    <h2 class="title-h2">Статьи автора</h2>
                    <div class="popular-articles__wrapper" id="articlesWrap">
                        @foreach($articles as $article)
                            @include('gzone.partials.article-item', ['article' => $article, 'category' => $article->category])
                        @endforeach
                    </div>
                    @if($articles->nextPageUrl())
                        <div class="button button_transp-hover blog--more" id="show-more-link-articles" data-link="{{ $articles->nextPageUrl() }}">Показать еще</div>
                    @endif
                </div>
            </div>
        </section>
    </main>
    @include('gzone.partials.footer')
@endsection


@section('js')
    <script>
        $(function () {
            var showMoreLink = $('#show-more-link-articles');
            var itemsWrap = $('#articlesWrap');

            if (showMoreLink.length && itemsWrap.length) {
                showMoreLink.click(function ($event) {
                    $event.preventDefault();
                    var url = $(this).data('link');
                    if (url) {
                        $.post(url)
                            .done(function(response) {
                                itemsWrap.append(response.html);
                                if (response.nextUrl) {
                                    showMoreLink.data('link', response.nextUrl)
                                } else {
                                    showMoreLink.hide();
                                }
                            })
                            .fail(function() {
                                console.log('Error : ', response);
                            });
                    }
                })

            }
        });
    </script>
@endsection
