@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="article-page">
        <div class="container-sides-lg">
            <div class="back-link">
                <div class="line"></div><a href="javascript:void(0)">Вернуться</a>
            </div>
            <div class="container-sm">
                <div class="article-page-inner">
                    <div class="article__tags">
                        @if($article->tags->isNotEmpty())
                            <div class="hashtags">
                                @foreach($article->tags as $tag)
                                    <a href="javascript:void(0)" class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        @endif
                        <div class="article__action bookmark">
                            <svg class="icon icon-mark ">
                                <use xlink:href="./images/sprite-inline.svg#mark"></use>
                            </svg>
                        </div>
                    </div>
                    <h1 class="title-h2">{{ $article->seo_h1 ?? $article->title }}</h1>
                    <div class="article__info">
                        <div class="article__author">
                            <div class="article__author-img">
                                <img src="{{ asset($article->user->image) }}" alt=""/>
                            </div><a class="article__author-name" href="javascript:void(0)">{{ $article->user->name }}</a>
                        </div><span class="article__reading">Читать {{ $article->time_read }} мин</span>
                    </div>
                    <div class="article__img">
                        <div class="article__img-wrapper">
                            <img src="{{ asset($article->image) }}" alt=""/>
                        </div>
                    </div>
                    {!! $article->content !!}

                    <div class="subscribe-banner">
                        <div class="subscribe-banner__top">
                            <div class="subscribe-banner__desc">
                                <div class="subscribe-banner__caption"><span class="title-h3">Дайджест Maingame!</span></div>
                                <p class="subscribe-banner__text">Новости, лонгриды, мемасики – лучшее из мира киберспорта прямо у тебя в почте!</p>
                            </div>
                            <div class="subscribe-banner__icon">
                                <svg class="icon icon-maingame ">
                                    <use xlink:href="./images/sprite-inline.svg#maingame"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="subscribe-banner__form">
                            <form class="subscribe-form">
                                <label class="subscribe-form__email-label" for="subscribe-email-banner">Email</label>
                                <div class="subscribe-form__banner-field">
                                    <input class="subscribe-form__email-input" type="email" id="subscribe-email-banner" placeholder="Hideo_Kojima@mail.com"/>
                                    <button class="subscribe-form__submit">Подписаться</button>
                                </div>
                                <div class="subscribe-form__agree">
                                    <input type="checkbox" id="subscribe-checkbox-banner"/>
                                    <label for="subscribe-checkbox-banner">Разрешаю обработку моих личных данных</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($recommendation->isNotEmpty())
                    <aside class="section-aside">
                        <div class="section-aside__items">
                            @foreach($recommendation as $recomm)
                            <div class="section-aside__item">
                                <div class="news-info">
                                    <div class="news-info__bg-img"><img src="{{ asset($recomm->image) }}" alt=""/>
                                    </div><a href="javascript:void(0)"> </a>
                                    <div class="news-info__main">
                                        <div class="news-info__top">
                                            @if($recomm->tags->isNotEmpty())
                                                <div class="hashtags">
                                                    @foreach($recomm->tags as $tag)
                                                        <a href="javascript:void(0)" class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="news-info__action bookmark">
                                                <svg class="icon icon-mark ">
                                                    <use xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="news-info__caption">{{ $recomm->title }}</p>
                                        <div class="news-info__bottom"> <span class="news-info__date">{{ $recomm->date->format('d.m.Y') }}</span><span class="news-info__reading">Читать {{ $recomm->time_read }} мин</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="section-aside__item section-aside__item_show-md">
                                <div class="news-info news-info_coming">
                                    <div class="hashtags"><a href="javascript:void(0)">#Next article</a></div>
                                    <p>Coming soon...</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                    @endif
                </div>
            </div>
        </div>
        @include('gzone.partials.social-links')
    </main>
@endsection
