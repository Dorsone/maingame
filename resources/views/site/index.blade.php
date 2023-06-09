@extends('site.layout')
@php
    /** @var $categories \App\Models\ArticlesCategories [] */
    /** @var $slides \App\Models\MainSlides [] */
    /** @var $news \App\Models\Articles [] */
@endphp
@section('content')
    <section class="home-main">
        <div class="home-main__slider">
            @if($slides->isNotEmpty())
                <div class="swiper-container home-main__main">
                    <div class="swiper-wrapper">
                        @foreach($slides as $slide)
                            <a class="swiper-slide" href="{{ $slide->link }}">
                                <div class="home-main__main__img">
                                    <img src="{{ asset($slide->image) }}" alt=""/>
                                </div>
                                <div class="title title-h1"> {{ $slide->title }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-container home-main__small">
                    <div class="swiper-wrapper">
                        @foreach($slides as $slide)
                            <div class="swiper-slide">
                                <div class="home-main__small__img img-sm">
                                    <img src="{{ asset($slide->image) }}" alt=""/>
                                </div>
                                <svg class="circle-svg" width="72" height="72" viewBox="0 0 67 67" preserveAspectRatio="xMidYMin meet">
                                    <circle class="path" cx="33" cy="33" r="31" stroke="#3BE6EF" stroke-width="5px" stroke-dasharray="195 195" stroke-linecap="round"></circle>
                                </svg>
                                <div class="title title-h4"> {{ $slide->title }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="home-main__form">
            <div class="title title-h1"> Подпишись на обновления</div>
            <div class="sentence">Никакого спама! Только интересные новости по твоим предпочтениям</div>
            <form method="post"
                  data-success-block="home-main-subscribe-done"
                  class="js-send-form form form-line"
                  action="{{ route('site.subscribe') }}">
                @csrf
                <input name="mail" type="email" placeholder="Почта"/>
                <button>
                    <svg class="icon icon-send ">
                        <use xlink:href="/build/images/sprite-inline.svg#send"></use>
                    </svg>
                </button>
            </form>
            <div class="home-main-subscribe-done">
                <svg class="icon icon-check ">
                    <use xlink:href="/build/images/sprite-inline.svg#check"></use>
                </svg>
                <span class="sentence">Благодарим за подписку</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="title-line">
                <div class="title title-h2"> Категории</div>
                <a class="link-arrow" href="{{ route('site.categories') }}"><span>Смотреть все</span>
                    <svg class="icon icon-arrow ">
                        <use xlink:href="/build/images/sprite-inline.svg#arrow"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="category-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($categories as $cat)
                        <a class="swiper-slide category-slider__item" href="{{ route('site.category', ['categorySlug' => $cat->slug]) }}">
                            <div class="img-sm"><img src="{{ asset($cat->image) }}" alt=""/></div>
                            <div class="sentence">{{ $cat->title }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="title-line">
                <div class="title title-h1"> Последние новости киберспорта</div>
            </div>
            <div class="news-all">
                @foreach($news as $n)
                    <a class="item-block" href="{{ route('site.article', ['categorySlug' => $n->category->slug, 'articleSlug' => $n->slug]) }}">
                        <div class="item-block__save">
                            <svg class="icon icon-save ">
                                <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                            </svg>
                        </div>
                        <div class="item-block__pic">
                            <img src="{{ $n->image }}" alt=""/>
                        </div>
                        <div class="item-block__desc">
                            <div class="item-block__info">
                                <span>
                                    <svg class="icon icon-eye ">
                                        <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                                    </svg>
                                    {{ $n->views ?? 0 }}
                                </span>
                                <span>
                                    <svg class="icon icon-comment ">
                                        <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                                    </svg>
                                    {{ $n->comments_count }}
                                </span>
                            </div>
                            <div class="item-block__title">{{ $n->title }}</div>
                            <div class="item-block__text">{{ $n->content_preview }}</div>
                            <div class="item-block__date">{{ $n->date->format('d.m.Y') }}</div>
                            @if($n->time_read)
                                <div class="item-block__time">читать {{ $n->time_read }} мин</div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


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

        {{--
        @if($loop->iteration == 1)
            <section class="section">
                <div class="container">
                    <div class="banner">
                        <div class="banner__bg"><img src="/build/images/banner1.jpg" alt=""/>
                        </div>
                        <div class="banner__desc">
                            <div class="title-line">
                                <div class="title title-h1"> Стань студентом самой нескучной академии</div>
                            </div>
                            <div class="sentence">Регистрация займет всего 2 минуты, а еще текст</div>
                        </div>
                        <a class="link-blue link-default" href="javascript:void(0)">Зарегистрироваться</a>
                    </div>
                </div>
            </section>
        @endif
        @if($loop->iteration == 3)
            <section class="section">
                <div class="container">
                    <div class="banner">
                        <div class="banner__bg"><img src="/build/images/banner2.jpg" alt=""/>
                        </div>
                        <div class="banner__desc">
                            <div class="title-line">
                                <div class="title title-h1"> Принимай участие в Турнирах</div>
                            </div>
                            <div class="sentence">Регистрация займет всего 2 минуты, а еще текст</div>
                        </div>
                        <a class="link-velvet link-default" href="javascript:void(0)">Зарегистрироваться</a>
                    </div>
                </div>
            </section>
        @endif
        --}}
    @endforeach

@endsection
