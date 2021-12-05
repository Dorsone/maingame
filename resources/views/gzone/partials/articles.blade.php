@php $withAuthor = isset($withAuthor) ? $withAuthor : true @endphp
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
                        <a href="javascript:void(0)" class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                    @endforeach
                </div>
                <div class="article-preview__action">
                    <div class="see">
                        <svg class="icon icon-eye ">
                            <use xlink:href="{{ asset('images/sprite-inline.svg#eye') }}"></use>
                        </svg>
                        <span>{{ $article->views }}</span>
                    </div>
                    <div class="comment">
                        <svg class="icon icon-comment ">
                            <use xlink:href="{{ asset('images/sprite-inline.svg#comment') }}"></use>
                        </svg>
                        <span>{{ $article->comments->count() }}</span>
                    </div>
                    <div onclick="bookmark({{$article->id}}, this)" class="bookmark
                        @foreach ($article->bookmarks as $bookmark)
                            @if($bookmark->user_id == auth()->user()->id)
                                {{'add'}}
                            @endif
                        @endforeach
                    ">
                        <svg class="icon icon-mark ">
                            <use xlink:href="{{ asset('images/sprite-inline.svg#mark') }}"></use>
                        </svg>
                    </div>
                </div>
            @endif
        </div>
        <a class="article-preview__caption" href="{{ route('site.article', ['categorySlug' => $category->slug, 'articleSlug' => $article->slug]) }}">{{ $article->title }}</a>
        <p class="article-preview__text">{{ $article->content_preview }}</p>
        <div class="article-preview__info">
            @if($withAuthor)
                <div class="article-preview__author">
                    <div class="article-preview__author-img">
                        <img src="{{ asset($article->user->image) }}" alt=""/>
                    </div>
                    <a class="article-preview__author-name" href="{{ route('author.index', $article->user->id) }}">{{ $article->user->name }}</a>
                </div>
            @endif
            <span class="article-preview__date">{{ $article->created_at->format('d M. Y') }}</span>
            @if($article->time_read)
                <span class="article-preview__reading">Читать {{ $article->time_read }} мин</span>
            @endif
        </div>
    </div>
@endforeach
