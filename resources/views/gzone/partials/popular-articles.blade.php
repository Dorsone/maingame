<section class="popular-articles">
    <div class="container">
        <div class="container-md2">
            <h2 class="title-h2">Популярные</h2>
            <div class="popular-articles__wrapper">
                @foreach($category->articles->take(6) as $art)
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
                        <a class="article-preview__caption" href="javascript:void(0)">{{ $art->title }}</a>
                        <div class="article-preview__info">
                            <div class="article-preview__author">
                                <div class="article-preview__author-img">
                                    <img src="{{ asset($art->user->image) }}" alt=""/>
                                </div>
                                <a class="article-preview__author-name" href="javascript:void(0)">{{ $art->user->name }}</a>
                            </div>
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