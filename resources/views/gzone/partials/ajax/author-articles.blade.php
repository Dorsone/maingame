@foreach($articles as $article)
    <div class="article-preview">
        <div class="article-preview__img">
            <a href="{{ route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug]) }}">
                <img src="{{ asset($article->image) }}" alt=""/></a>
        </div>
        <div class="article-preview__tags">
            @if($article->tags->isNotEmpty())
                <div class="hashtags">
                    @foreach($article->tags as $tag)
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
        <a class="article-preview__caption" href="{{ route('site.article', ['categorySlug' => $article->category->slug, 'articleSlug' => $article->slug]) }}">{{ $article->title }}</a>
        <p class="article-preview__text">{{ $article->content_preview }}</p>
        <div class="article-preview__info">
            <div class="article-preview__author">
                <div class="article-preview__author-img">
                    <img src="{{ asset($article->user->image) }}" alt=""/>
                </div>
                <a class="article-preview__author-name" href="{{ route('author.index', $article->user->id) }}">{{ $article->user->name }}</a>
            </div>
            @if($article->time_read)
                <span class="article-preview__reading">Читать {{ $article->time_read }} мин</span>
            @endif
        </div>
    </div>
@endforeach
