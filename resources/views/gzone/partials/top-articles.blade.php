<section class="top-articles">
    <div class="container">
        <div class="back-link">
            <div class="line"></div>
            <a href="{{ route('site.index') }}">Вернуться</a>
        </div>
        <div class="container-md2">
            <h1 class="title-h2">Важные новости киберспорта</h1>
            <div class="top-articles__block">
                @foreach($category->articles->take(2) as $art)
                    <div class="article-preview">
                        <div class="article-preview__img">
                            <a href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">
                                <img src="{{ asset($art->image) }}" alt=""/></a>
                        </div>
                        <div class="article-preview__tags">
                            @if($art->tags->isNotEmpty())
                                <div class="hashtags">
                                    @foreach($art->tags as $tag)
                                        <a href="{{route('site.categories', $tag->slug)}}"
                                           class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="article-preview__action bookmark">
                                <svg class="icon icon-mark ">
                                    <use xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <a class="article-preview__caption" href="javascript:void(0)">{{ $art->title }}</a>
                        <div class="article-preview__info"><span
                                class="article-preview__date">{{ $art->created_at->format('d M. Y') }}</span>
                            @if($art->time_read)
                                <span class="article-preview__reading">Читать {{ $art->time_read }} мин</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="latest-news">
                @foreach($category->articles->take(3) as $art)
                    <div class="article-preview">
                        <div class="article-preview__img">
                            <a href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">
                                <img src="{{ asset($art->image) }}" alt=""/>
                            </a>
                        </div>
                        <div class="article-preview__tags">
                            @if($art->tags->isNotEmpty())
                                <div class="hashtags">
                                    @foreach($art->tags as $tag)
                                        <a href="{{route('site.categories', $tag->slug)}}"
                                           class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="article-preview__action bookmark">
                                <svg class="icon icon-mark ">
                                    <use xlink:href="{{ asset('/images/sprite-inline.svg#mark') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <a class="article-preview__caption"
                           href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $art->slug]) }}">{{ $art->title }}</a>
                        <div class="article-preview__info">
                            <span class="article-preview__date">{{ $art->created_at->format('d M. Y') }}</span>
                            @if($art->time_read)
                                <span class="article-preview__reading">Читать {{ $art->time_read }} мин</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
