@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="media-page">
        @include('gzone.partials.side-sticky')
        @foreach($categories as $key => $category)
            @php $isEven = ($key+1) % 2 == 0  @endphp
            @if(!$isEven)
                <div class="top-articles">
                    <div class="container">
                        @if($loop->first)
                            @if(url()->previous())
                                <div class="back-link">
                                    <div class="line"></div>
                                    <a href="{{ route('site.categories') }}">Вернуться</a>
                                </div>
                            @endif
                            <div class="container-md2">
                                @include('gzone.partials.breadcrumbs')
                            </div>
                        @endif

                        <div class="container-md2">
                            @if($key == 2)
                                <div class="subscribe-banner">
                                    <div class="subscribe-banner__desc">
                                        <div class="subscribe-banner__caption">
                                            <svg class="icon icon-maingame ">
                                                <use xlink:href="./images/sprite-inline.svg#maingame"></use>
                                            </svg><span class="title-h3">Дайджест Maingame!</span>
                                        </div>
                                        <p class="subscribe-banner__text">Новости, лонгриды, мемасики – лучшее из мира киберспорта прямо у тебя в почте!</p>
                                    </div>
                                    <div class="subscribe-banner__form">
                                        <form method="post"
                                              data-success-block="footer-subscribe-done"
                                              class="subscribe-form"
                                              action="{{ route('site.subscribe') }}">
                                            @csrf
                                            <label class="subscribe-form__email-label" for="subscribe-email-banner">Email</label>
                                            <div class="subscribe-form__banner-field">
                                                <input class="subscribe-form__email-input" name="email" type="email" id="subscribe-email-banner" placeholder="Hideo_Kojima@mail.com"/>
                                                <button class="subscribe-form__submit">Подписаться</button>
                                            </div>
                                            <div class="subscribe-form__agree">
                                                <input type="checkbox" id="subscribe-checkbox-banner"/>
                                                <label for="subscribe-checkbox-banner">Разрешаю обработку моих личных данных</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class="top-articles-title">
                                <h2 class="title-h2">{{ $category->title }}</h2><a class="button button_transp-hover" href="{{ route('site.category', $category->slug) }}">Узнать больше</a>
                            </div>
                            <div class="popular-articles__wrapper">
                                @include('gzone.partials.articles', ['articles' => $category->articles->take(3), 'withAuthor' => $loop->first ? false : true])
                            </div>
                            @if($loop->first)
                                    <div class="event-banner">
                                        <div class="event-banner__content">
                                            <div class="event-banner__bg"><img src="{{ asset('images/image-19.png') }}" alt=""/>
                                            </div>
                                            <div class="event-banner__desc">
                                                <p class="event-banner__caption title-h3">Врывайся в киберспорт</p>
                                                <p class="event-banner__text">Участвуй в призовых турнирах по CS:GO, Dota 2, Dota Underlords и TFT</p>
                                                <button class="button">Играть</button>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
                @continue
            @endif
            <div class="popular-articles">
                <div class="container">
                    <div class="container-md2">
                        <div class="top-articles-title">
                            <h2 class="title-h2">{{ $category->title }}</h2><a class="button button_transp-hover" href="{{ route('site.category', $category->slug) }}">Узнать больше</a>
                        </div>
                        <div class="popular-articles__wrapper">
                            @include('gzone.partials.articles', ['articles' => $category->articles->take(3)])
                        </div>
                    </div>
                </div>
            </div>
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
