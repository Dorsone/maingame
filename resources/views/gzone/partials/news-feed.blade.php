<section class="news-feed">
    <div class="container">
        <div class="container-md2">
            <h2 class="title-h2">Лента</h2>
            <div class="news-feed__wrapper">
                @foreach($category->articles->take(6) as $key => $art)
                    <div class="article-preview">
                        <div class="article-preview__img">
                            <a href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">
                                <img src="{{ asset($art->image) }}" alt=""/></a>
                        </div>
                        <div class="article-preview__tags">
                            @if($art->tags->isNotEmpty())
                                <div class="hashtags">
                                    @foreach($art->tags as $tag)
                                        <a href="javascript:void(0)" class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="article-preview__action bookmark">
                                <svg class="icon icon-mark ">
                                    <use xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <a class="article-preview__caption" href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">{{ $art->title }}</a>
                        <p class="article-preview__text">{{ $art->content_preview }}</p>
                        <div class="article-preview__info">
                            <div class="article-preview__author">
                                <div class="article-preview__author-img">
                                    <img src="{{ asset($art->user->image) }}" alt=""/>
                                </div>
                                <a class="article-preview__author-name" href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">{{ $art->user->name }}</a>
                            </div>
                            @if($art->time_read)
                                <span class="article-preview__reading">Читать {{ $art->time_read }} мин</span>
                            @endif
                        </div>
                    </div>
                    @if($key === 3)
                        <div class="subscribe-banner">
                            <div class="subscribe-banner__desc">
                                <div class="subscribe-banner__caption">
                                    <svg class="icon icon-maingame ">
                                        <use xlink:href="./images/sprite-inline.svg#maingame"></use>
                                    </svg>
                                    <span class="title-h3">Дайджест Maingame!</span>
                                </div>
                                <p class="subscribe-banner__text">Новости, лонгриды, мемасики – лучшее из мира
                                    киберспорта прямо у тебя в почте!</p>
                            </div>
                            <div class="subscribe-banner__form">
                                <form class="subscribe-form">
                                    <label class="subscribe-form__email-label"
                                           for="subscribe-email-banner">Email</label>
                                    <div class="subscribe-form__banner-field">
                                        <input class="subscribe-form__email-input" type="email"
                                               id="subscribe-email-banner" placeholder="Hideo_Kojima@mail.com"/>
                                        <button class="subscribe-form__submit">Подписаться</button>
                                    </div>
                                    <div class="subscribe-form__agree">
                                        <input type="checkbox" id="subscribe-checkbox-banner"/>
                                        <label for="subscribe-checkbox-banner">Разрешаю обработку моих личных
                                            данных</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="load-more">
                <button class="button button_transp-hover">Показать еще</button>
            </div>
        </div>
    </div>
</section>
