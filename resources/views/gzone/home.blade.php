@extends('gzone.layouts.main')

@section('title', 'Maingame')

@section('header')
    @include('gzone.partials.header-main')
@endsection
@section('content')
    <main class="homepage full-height">
        <div class="swiper-container page-slider">
            <div class="swiper-wrapper page-slider__wrapper">
                <div class="swiper-slide screen">
                    <section class="main-section">
                        <div class="main-page-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slide-main">
                                            <div class="slide-main__bg"><img src="{{asset('images/image-4.jpg')}}"
                                                                             alt=""/>
                                            </div>
                                            <div class="container-sides-lg">
                                                <div class="slide-main__body">
                                                    <div class="slide-main__content"><span
                                                            class="tag">Top stories</span>
                                                        <div class="title">
                                                            <h1>Конкурс прогнозистов на AniMajor</h1>
                                                        </div>
                                                        <p>Мы пересмотрели привычные подходы к созданию киберспортивных
                                                            продуктов и создаём мир, где во главе угла — креатив,
                                                            страсть и мастерство</p>
                                                    </div>
                                                    <a class="detail" href="javascript:void(0)">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-main">
                                            <div class="slide-main__bg"><img src="./images/image-4.jpg" alt=""/>
                                            </div>
                                            <div class="container-sides-lg">
                                                <div class="slide-main__body">
                                                    <div class="slide-main__content"><span
                                                            class="tag">Top stories</span>
                                                        <div class="title">
                                                            <p>Конкурс прогнозистов на <em>AniMajor</em></p>
                                                        </div>
                                                        <p>Мы пересмотрели привычные подходы к созданию киберспортивных
                                                            продуктов и создаём мир, где во главе угла — креатив,
                                                            страсть и мастерство</p>
                                                    </div>
                                                    <a class="detail" href="javascript:void(0)">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper">
                                <div class="swiper-button-prev"><img src="./images/arrow-left.svg" alt=""/>
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"><img src="./images/arrow-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>
                        <aside class="section-aside">
                            <div class="section-aside__items">
                                <div class="section-aside__item"><a class="page-link" href="{{route('site.categories')}}">
                                        <div class="page-link__bg"></div>
                                        <div class="page-link__icon">
                                            <svg class="icon icon-media ">
                                                <use xlink:href="./images/sprite-inline.svg#media"></use>
                                            </svg>
                                        </div>
                                        <div class="page-link__text">
                                            <p class="page-link__caption">Meдиа</p>
                                            <p class="page-link__desc">Следи за новостями</p>
                                        </div>
                                    </a></div>
                                <div class="section-aside__item"><a class="page-link" href="{{url('site.learning')}}">
                                        <div class="page-link__bg"></div>
                                        <div class="page-link__icon">
                                            <svg class="icon icon-academy ">
                                                <use xlink:href="./images/sprite-inline.svg#academy"></use>
                                            </svg>
                                        </div>
                                        <div class="page-link__text">
                                            <p class="page-link__caption">Академия</p>
                                            <p class="page-link__desc">Учись побеждать</p>
                                        </div>
                                    </a></div>
                                <div class="section-aside__item"><a class="page-link" href="{{route('site.tournament')}}">
                                        <div class="page-link__bg"></div>
                                        <div class="page-link__icon">
                                            <svg class="icon icon-arena ">
                                                <use xlink:href="./images/sprite-inline.svg#arena"></use>
                                            </svg>
                                        </div>
                                        <div class="page-link__text">
                                            <p class="page-link__caption">Арена</p>
                                            <p class="page-link__desc">Рубись за награды</p>
                                        </div>
                                    </a></div>
                            </div>
                        </aside>
                    </section>
                </div>
                <div class="swiper-slide screen">
                    <section class="homepage-media">
                        <div class="background-img"><img src="./images/image-10.jpg" alt=""/>
                        </div>
                        <div class="container-sides-lg">
                            <div class="homepage-media__main">
                                <div class="content-cols-wrapper">
                                    <div class="content-left">
                                        <div class="homepage-media__desc">
                                            <h2 class="title-h2">Вдохновляйся нашим шоу</h2>
                                            <p class="homepage-media__text">Мы пересмотрели привычные подходы к созданию
                                                киберспортивных продуктов и создаём мир, где во главе угла — креатив,
                                                страсть и мастерство.</p>
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <ul class="video-list">
                                            <li><a class="video-list__link" href="javascript:void(0)">
                                                    <div class="video-list__icon"><img src="./images/youtube-color.svg"
                                                                                       alt=""/>
                                                    </div>
                                                    <div class="video-list__desc">
                                                        <p class="video-list__title">WePlay! Esports</p>
                                                        <p>Качественный Видео Контент</p>
                                                    </div>
                                                </a></li>
                                            <li><a class="video-list__link" href="javascript:void(0)">
                                                    <div class="video-list__icon"><img src="./images/youtube-color.svg"
                                                                                       alt=""/>
                                                    </div>
                                                    <div class="video-list__desc">
                                                        <p class="video-list__title">WePlay! Dota 2</p>
                                                        <p>Dota 2 контент WePlay! Esports</p>
                                                    </div>
                                                </a></li>
                                            <li><a class="video-list__link" href="javascript:void(0)">
                                                    <div class="video-list__icon"><img src="./images/youtube-color.svg"
                                                                                       alt=""/>
                                                    </div>
                                                    <div class="video-list__desc">
                                                        <p class="video-list__title">WePlay! CS:GO</p>
                                                        <p>Лучшее из CS:GO WePlay! Esports</p>
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content-bottom">
                                    <div class="content-bottom__left">
                                        <div class="play-btn"><a href="javascript:void(0)" data-touch="false"
                                                                 data-fancybox="video-1"
                                                                 data-src="https://www.youtube.com/embed/ad276Q1xZYA">
                                                <svg class="icon icon-play ">
                                                    <use xlink:href="./images/sprite-inline.svg#play"></use>
                                                </svg>
                                                Воспроизвести</a></div>
                                    </div>
                                    <div class="content-bottom__right">
                                        <div class="current-video">
                                            <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a
                                                    href="javascript:void(0)">#DOTA 2</a></div>
                                            <p class="current-video__title">ODPixel - Techies (feat. BSJ) (Official
                                                Video)</p>
                                            <p class="current-video__desc">ODPixel - Techies (feat. BSJ) (Official
                                                Video)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <aside class="section-aside">
                                <div class="section-aside__items">
                                    <div class="section-aside__item">
                                        <div class="media-one">
                                            <div class="media-one__bg-img"><img src="./images/video-aside-1.jpg"
                                                                                alt=""/>
                                            </div>
                                            <div class="media-one__icon" data-touch="false" data-fancybox="video-2"
                                                 data-src="https://www.youtube-nocookie.com/embed/B6t2ZHB_uNo"
                                                 title="YouTube video player">
                                                <svg class="icon icon-play ">
                                                    <use xlink:href="./images/sprite-inline.svg#play"></use>
                                                </svg>
                                            </div>
                                            <div class="media-one__text">
                                                <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a
                                                        href="javascript:void(0)">#DOTA 2</a></div>
                                                <p class="media-one__caption">ODPixel - Techies (feat. BSJ) (Official
                                                    Video)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-aside__item">
                                        <div class="media-one">
                                            <div class="media-one__bg-img"><img src="./images/video-aside-2.jpg"
                                                                                alt=""/>
                                            </div>
                                            <div class="media-one__icon" data-touch="false" data-fancybox="video-3"
                                                 data-src="https://www.youtube.com/embed/RXoWqbDqNQg">
                                                <svg class="icon icon-play ">
                                                    <use xlink:href="./images/sprite-inline.svg#play"></use>
                                                </svg>
                                            </div>
                                            <div class="media-one__text">
                                                <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a
                                                        href="javascript:void(0)">#DOTA 2</a></div>
                                                <p class="media-one__caption">ODPixel - Techies (feat. BSJ) (Official
                                                    Video)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-aside__item">
                                        <div class="media-one">
                                            <div class="media-one__bg-img"><img src="./images/video-aside-3.jpg"
                                                                                alt=""/>
                                            </div>
                                            <div class="media-one__icon" data-touch="false" data-fancybox="video-4"
                                                 data-src="https://www.youtube.com/embed/PfbBu0lBXQQ">
                                                <svg class="icon icon-play ">
                                                    <use xlink:href="./images/sprite-inline.svg#play"></use>
                                                </svg>
                                            </div>
                                            <div class="media-one__text">
                                                <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a
                                                        href="javascript:void(0)">#DOTA 2</a></div>
                                                <p class="media-one__caption">ODPixel - Techies (feat. BSJ) (Official
                                                    Video)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-aside__item section-aside__item_show-md">
                                        <div class="media-one media-one_coming">
                                            <div class="hashtags"><a href="javascript:void(0)">#Next video</a></div>
                                            <p>Coming soon...</p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </section>
                </div>
                <div class="swiper-slide screen">
                    <section class="homepage-news">
                        <div class="news-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($news as $key => $article)
                                    @if ($key < 2)
                                        <div class="swiper-slide">
                                            <div class="container-sides-lg">
                                                <div class="homepage-news__main">
                                                    <div class="homepage-news__title-block">
                                                        <h2 class="title-h2">{{$article->title}}</h2>
                                                        <a href="{{route('site.articles')}}">Все новости</a>
                                                    </div>
                                                    <div class="homepage-news__desc">
                                                        <a class="homepage-news__banner" href="{{ route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug]) }}">
                                                            <img src="{{ asset($article->image) }}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="homepage-news__news-info news-info">
                                                        <div class="news-info__top">
                                                            @if($article->tags->isNotEmpty())
                                                                <div class="hashtags">
                                                                    @foreach($article->tags as $tag)
                                                                        <a href="{{route('site.categories', $tag->slug)}}"
                                                                           class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <div class="news-info__action bookmark">
                                                                <svg class="icon icon-mark ">
                                                                    <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <p class="news-info__caption">{{$article->content_preview}}</p>
                                                        <div class="news-info__bottom">
                                                            <span class="news-info__date">{{ $article->created_at->format('d M. Y') }}</span>
                                                            @if($article->time_read)
                                                                <span class="news-info__reading">Читать {{ $article->time_read }} мин</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>


                            <div class="pagination-wrapper">
                                <div class="swiper-button-prev"><img src="{{asset('images/arrow-left.svg')}}" alt=""/>
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"><img src="{{asset('images/arrow-right.svg')}}" alt=""/>
                                </div>
                            </div>
                        </div>
                        <aside class="section-aside">
                            <div class="section-aside__items">
                                @foreach($news as $key => $article)
                                    @if($key > 1)
                                        <div class="section-aside__item">
                                            <div class="news-info">
                                                <div class="news-info__bg-img">
                                                    <img src="{{ asset($article->image) }}" alt=""/>
                                                </div>
                                                <a href="{{ route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug]) }}">
                                                </a>
                                                <div class="news-info__main">
                                                    <div class="news-info__top">
                                                        @if($article->tags->isNotEmpty())
                                                            <div class="hashtags">
                                                                @foreach($article->tags as $tag)
                                                                    <a href="{{route('site.categories', $tag->slug)}}"
                                                                       class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        <div class="news-info__action bookmark">
                                                            <svg class="icon icon-mark ">
                                                                <use
                                                                    xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="news-info__caption">
                                                        <a href="{{ route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug]) }}">
                                                            {{ $article->title }}
                                                        </a>
                                                    </p>
                                                    <div class="news-info__bottom">
                                                    <span class="news-info__date">{{ $article->created_at->format('d M. Y') }}</span>
                                                        @if($article->time_read)
                                                            <span
                                                                class="news-info__reading">Читать {{ $article->time_read }} мин</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="section-aside__item section-aside__item_show-md">
                                    <div class="news-info news-info_coming">
                                        <div class="hashtags"><a href="javascript:void(0)">#Next video</a></div>
                                        <p>Coming soon...</p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </section>
                </div>
                <div class="swiper-slide screen">
                    @include('gzone.partials.footer')
                </div>
            </div>
        </div>
        <div class="page-numbering">
            <div class="top-line">
                <div class="number-line"></div>
                <span class="number">01</span>
            </div>
            <div class="bottom-line">
                <div class="number-line"></div>
                <span class="number">02</span>
            </div>
        </div>
        @include('gzone.partials.social-links')
    </main>
@endsection
