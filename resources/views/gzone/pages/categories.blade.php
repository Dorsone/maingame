@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="media-page">
        @include('gzone.partials.side-sticky')

        @foreach($categories as $key => $category)
            @switch($key)
                @case(0)
                    @include('gzone.partials.top-articles', ['category' => $category])
                    <div class="container">
                    <div class="container-md2">
                        <div class="event-banner">
                            <div class="event-banner__content">
                                <div class="event-banner__bg"><img src="./images/image-19.png" alt=""/>
                                </div>
                                <div class="event-banner__desc">
                                    <p class="event-banner__caption title-h3">Врывайся в киберспорт</p>
                                    <p class="event-banner__text">Участвуй в призовых турнирах по CS:GO, Dota 2, Dota Underlords
                                        и TFT</p>
                                    <button class="button">Играть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @case(1)
                    @include('gzone.partials.popular-articles', ['category' => $category])
                @break
                @case(2)
                    @include('gzone.partials.news-feed', ['category' => $category])
                @break
            @endswitch
        @endforeach

        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection

@section('js')
    <script>
        $(function () {
            var showMoreLink = $('#show-more-link-articles');
            var itemsWrap = $('#articlesWrap');

            if (showMoreLink.length && itemsWrap.length) {
                showMoreLink.find('.button').click(function ($event) {
                    $event.preventDefault();
                    var url = $(this).data('link');
                    if (url) {
                        $.post(url)
                            .done(function(response) {
                                itemsWrap.append(response.html);
                                if (response.nextUrl) {
                                    showMoreLink.find('.button').data('link', response.nextUrl)
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
