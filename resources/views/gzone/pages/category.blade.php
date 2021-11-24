@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection
@section('title', $category->seo_title ?? $category->title)
@section('description', $category->seo_description)
@section('keywords', $category->seo_keywords)

@section('content')
    <main>
        <section class="top-articles">
            <div class="container">
                @if(url()->previous())
                    <div class="back-link">
                        <div class="line"></div>
                        <a href="{{ route('site.categories') }}">Вернуться</a>
                    </div>
                @endif
                <div class="container-md2">
                    @include('gzone.partials.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
                </div>
                <div class="container-md2">
                    <h1 class="title-h2">{{ $category->seo_h1 ?? $category->title }}</h1>
                    <div class="category-sort">
                        <div class="category-filter">
                            <div class="__select" data-state="">
                                <svg class="icon icon-arrow-down ">
                                    <use xlink:href="{{ asset('images/sprite-inline.svg#arrow-down') }}"></use>
                                </svg>
                                <div class="__select__title"></div>
                                <div class="__select__content">
                                    <input class="__select__input" type="radio" id="new" data-col="date"
                                           data-sort="desc" checked="checked"/>
                                    <label class="__select__label" for="new">Сначала новые</label>

                                    <input class="__select__input" type="radio" data-col="time_read" data-sort="asc"
                                           id="short"/>
                                    <label class="__select__label" for="short">Сначала короткие</label>

                                    <input class="__select__input" type="radio" data-col="time_read" data-sort="desc"
                                           id="cheap"/>
                                    <label class="__select__label" for="cheap">Сначала длинные</label>

                                    <input class="__select__input" type="radio" data-col="views" data-sort="desc"
                                           id="views"/>
                                    <label class="__select__label" for="views">Сначала популярные</label>
                                </div>
                            </div>
                            <!--.category-filter-current Сначала новые-->
                            <!--    +icon('arrow-down')-->
                            <!--.category-filter-list-->
                            <!--    p від дешевих до дорогих-->
                            <!--    p від дорогих до дешевихp по імені
                            -->
                        </div>
                        @if($tags->isNotEmpty())
                            <div class="category-tags">
                                @foreach($tags as $tag)
                                    <button class="button-filter" data-tag="{{ $tag->slug }}">#{{ $tag->name }}</button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="popular-articles__wrapper" id="articlesWrap">
                        @foreach($articles as $article)
                            <div class="article-preview">
                                <div class="article-preview__img">
                                    <a href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $article->slug]) }}">
                                        <img src="{{ asset($article->image) }}" alt=""/></a>
                                </div>
                                <div class="article-preview__tags">
                                    @if($article->tags->isNotEmpty())
                                        <div class="hashtags">
                                            @foreach($article->tags as $tag)
                                                <a href="javascript:void(0)"
                                                   class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="article-preview__action">
                                        <div class="see">
                                            <svg class="icon icon-eye ">
                                                <use xlink:href="{{ asset('images/sprite-inline.svg#eye') }}"></use>
                                            </svg>
                                            <span>{{ $article->views ?? 0 }}</span>
                                        </div>
                                        <div class="comment">
                                            <svg class="icon icon-comment ">
                                                <use xlink:href="{{ asset('images/sprite-inline.svg#comment') }}"></use>
                                            </svg>
                                            <span>{{ $article->comments_count }}</span>
                                        </div>
                                        <div class="bookmark">
                                            <svg class="icon icon-mark ">
                                                <use xlink:href="{{ asset('images/sprite-inline.svg#mark') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <a class="article-preview__caption"
                                   href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $article->slug]) }}">{{ $article->title }}</a>
                                <p class="article-preview__text">{{ $article->content_preview }}</p>
                                <div class="article-preview__info">
                                    <div class="article-preview__author">
                                        <div class="article-preview__author-img">
                                            <img src="{{ asset($article->user->image) }}" alt=""/>
                                        </div>
                                        <a class="article-preview__author-name"
                                           href="{{ route('site.author', $article->user->id) }}">{{ $article->user->name }}</a>
                                    </div>
                                    @if($article->time_read)
                                        <span
                                            class="article-preview__reading">Читать {{ $article->time_read }} мин</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($articles->nextPageUrl())
                        <div class="button button_transp-hover blog--more" id="show-more-link-articles"
                             data-link="{{ $articles->nextPageUrl() }}">Показать еще
                        </div>
                    @endif
                </div>
            </div>
        </section>
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
    @include('gzone.partials.footer')
@endsection


@section('js')
    <script>
        $(function () {
            var showMoreLink = $('#show-more-link-articles');
            var itemsWrap = $('#articlesWrap');
            let sortSelected;

            $('.__select__title').on('DOMSubtreeModified', function ($event) {
                const targetText = $($event.target).text();
                const targetIdentifier = $('.__select__label:contains(' + targetText + ')').attr('for');
                sortSelected = $('#' + targetIdentifier);
                getArticles();
            });

            function getArticles(url = null, replace = true) {
                let content = itemsWrap;
                let tagsList = $('.button-filter.active');
                let tags = [];
                let sort = {};

                if (url === null) {
                    url = document.location.href;
                }

                if (tagsList.length > 0) {
                    tagsList.each(function (key, item) {
                        tags.push($(item).attr('data-tag'));
                    })
                }

                sort.col = sortSelected.attr('data-col');
                sort.order = sortSelected.attr('data-sort');
                console.log(sort);
                $.post(url, {
                    tags: tags,
                    sort: sort,
                })
                    .done(function (response) {
                        itemsWrap.empty().append(response.html);
                        if (response.nextUrl) {
                            showMoreLink.data('link', response.nextUrl)
                            showMoreLink.show();
                        } else {
                            showMoreLink.hide();
                        }
                    })
                    .fail(function () {
                        console.log('Error : ', response);
                    });
            }

            // === current tag ===
            $('.button-filter').on('click', function () {
                $(this).toggleClass('active');
                getArticles();
            });
            $('.button-filter').on('click', function () {
                $('.tag').removeClass('active');
                getArticles();
            })

            if (showMoreLink.length && itemsWrap.length) {
                showMoreLink.click(function ($event) {
                    $event.preventDefault();
                    var url = $(this).data('link');
                    if (url) {
                        $.post(url)
                            .done(function (response) {
                                itemsWrap.append(response.html);
                                if (response.nextUrl) {
                                    showMoreLink.data('link', response.nextUrl)
                                } else {
                                    showMoreLink.hide();
                                }
                            })
                            .fail(function () {
                                console.log('Error : ', response);
                            });
                    }
                })

            }
        });
    </script>
@endsection
