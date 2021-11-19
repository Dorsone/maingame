@extends('gzone.layouts.main')

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
                                            <div class="slide-main__bg"><img src="{{asset('images/image-4.jpg')}}" alt=""/>
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
                                <div class="section-aside__item"><a class="page-link" href="javascript:void(0)">
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
                                <div class="section-aside__item"><a class="page-link" href="javascript:void(0)">
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
                                <div class="section-aside__item"><a class="page-link" href="javascript:void(0)">
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
                                <div class="swiper-slide">
                                    <div class="container-sides-lg">
                                        <div class="homepage-news__main">
                                            <div class="homepage-news__title-block">
                                                <h2 class="title-h2">Следи за миром киберспорта</h2><a
                                                    href="javascript:void(0)">Все новости</a>
                                            </div>
                                            <div class="homepage-news__desc"><a class="homepage-news__banner"
                                                                                href="javascript:void(0)"><img
                                                        src="./images/news-banner.png" alt=""/></a></div>
                                            <div class="homepage-news__news-info news-info">
                                                <div class="news-info__top">
                                                    <div class="hashtags"><a href="javascript:void(0)">#WEPLAY!
                                                            VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                                    <div class="news-info__action bookmark">
                                                        <svg class="icon icon-mark ">
                                                            <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p class="news-info__caption">ODPixel - Techies (feat. BSJ) (Official
                                                    Video)</p>
                                                <div class="news-info__bottom"><span class="news-info__date">30 апр. 2021</span><span
                                                        class="news-info__reading">Читать 1 мин</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="container-sides-lg">
                                        <div class="homepage-news__main">
                                            <div class="homepage-news__title-block">
                                                <h2 class="title-h2">Следи за миром киберспорта</h2><a
                                                    href="javascript:void(0)">Все новости</a>
                                            </div>
                                            <div class="homepage-news__desc"><a class="homepage-news__banner"
                                                                                href="javascript:void(0)"><img
                                                        src="./images/news-banner.png" alt=""/></a></div>
                                            <div class="homepage-news__news-info news-info">
                                                <div class="news-info__top">
                                                    <div class="hashtags"><a href="javascript:void(0)">#WEPLAY!
                                                            VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                                    <div class="news-info__action bookmark">
                                                        <svg class="icon icon-mark ">
                                                            <use xlink:href="./images/sprite-inline.svg#mark"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p class="news-info__caption">ODPixel - Techies (feat. BSJ) (Official
                                                    Video)</p>
                                                <div class="news-info__bottom"><span class="news-info__date">30 апр. 2021</span><span
                                                        class="news-info__reading">Читать 1 мин</span></div>
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
                                @foreach($news as $article)
                                    <div class="section-aside__item">
                                        <div class="news-info">
                                            <div class="news-info__bg-img"><img src="{{ asset($article->image) }}" alt=""/>
                                            </div>
                                            <a href="javascript:void(0)"> </a>
                                            <div class="news-info__main">
                                                <div class="news-info__top">
                                                    @if($article->tags->isNotEmpty())
                                                        <div class="hashtags">
                                                            @foreach($article->tags as $tag)
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
                                                <p class="news-info__caption">{{ $article->title }}</p>
                                                <div class="news-info__bottom">
                                                    <span
                                                        class="news-info__date">{{ $article->created_at->format('d M. Y') }}</span>
                                                    @if($article->time_read)
                                                        <span
                                                            class="news-info__reading">Читать {{ $article->time_read }} мин</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <section class="footer">
                        <aside class="section-aside">
                            <div class="section-aside__social-feed"><img src="./images/social-feed.jpg" alt=""/><img
                                    src="./images/social-feed.jpg" alt=""/>
                            </div>
                        </aside>
                        <div class="container-sides-lg">
                            <div class="footer__content">
                                <div class="content-left">
                                    <div class="footer__main"><span class="tag">Social</span>
                                        <h2 class="title-h2">Присоединяйся к нашим комьюнити </h2>
                                        <p>Получай +100 к знаниям, поддержке и победам.</p>
                                        <div class="footer__subscribe subscribe">
                                            <p>Подписывайся</p>
                                            <form class="subscribe-form">
                                                <div class="subscribe-form__email">
                                                    <label for="subscribe-email">Email</label>
                                                    <input type="email" id="subscribe-email"
                                                           placeholder="Hideo_Kojima@mail.com"/>
                                                </div>
                                                <div class="subscribe-form__agree">
                                                    <input type="checkbox" id="subscribe-checkbox"/>
                                                    <label for="subscribe-checkbox">Разрешаю обработку моих личных
                                                        данных</label>
                                                </div>
                                                <button class="subscribe-form__submit">Подписаться</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="footer__bottom">
                                        <p class="footer__address">1013 Centre RD STE 403B, г. Вильмингтон, штат
                                            Делавер, США</p>
                                        <p class="footer__copyright">© 2011 - 2021 Maingame Все права защищены</p>
                                    </div>
                                </div>
                                <div class="content-right">
                                    <ul class="social-list">
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/facebook-original.svg"
                                                                                    alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Facebook</p>
                                                    <p>Главные новости мира гейминга</p>
                                                </div>
                                            </a></li>
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/twitter-original.svg"
                                                                                    alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Twitter</p>
                                                    <p>Когда нет времени читать много</p>
                                                </div>
                                            </a></li>
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/telegram.svg" alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Telegram</p>
                                                    <p>Всё по теме в одном канале</p>
                                                </div>
                                            </a></li>
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/instagram.svg"
                                                                                    alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Instagram</p>
                                                    <p>Показываем всё, что обычно скрыто</p>
                                                </div>
                                            </a></li>
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/zenhub.svg" alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Zen</p>
                                                    <p>Лучшие статьи редакции</p>
                                                </div>
                                            </a></li>
                                        <li><a class="social-list__link" href="javascript:void(0)">
                                                <div class="social-list__icon"><img src="./images/discord-original.svg"
                                                                                    alt=""/>
                                                </div>
                                                <div class="social-list__desc">
                                                    <p class="social-list__title">Discord</p>
                                                    <p>Общаемся про киберспорт и не только</p>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
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
        <div class="social">
            <ul class="social__links">
                <li><a href="https://youtube.com">
                        <svg class="icon icon-youtube ">
                            <use xlink:href="./images/sprite-inline.svg#youtube"></use>
                        </svg>
                    </a></li>
                <li><a href="https://google.com">
                        <svg class="icon icon-google ">
                            <use xlink:href="./images/sprite-inline.svg#google"></use>
                        </svg>
                    </a></li>
                <li><a href="https://discord.com">
                        <svg class="icon icon-discord ">
                            <use xlink:href="./images/sprite-inline.svg#discord"></use>
                        </svg>
                    </a></li>
                <li><a href="https://facebook.com">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="./images/sprite-inline.svg#facebook"></use>
                        </svg>
                    </a></li>
            </ul>
        </div>
    </main>
@endsection
