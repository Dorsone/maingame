@php /** @var $art \App\Models\Articles */ @endphp
<a class="item-block col"
   href="{{ route('site.article', ['categorySlug' => $cat->slug, 'articleSlug' => $art->slug]) }}">
    <div class="item-block__save">
        <svg class="icon icon-save ">
            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
        </svg>
    </div>
    <div class="item-block__pic">
        <img src="{{ asset($art->image) }}" alt=""/>
        @if($art->tags->isNotEmpty())
            <div class="item-block__marks">
                @foreach($art->tags as $tag)
                    <div class="mark {{ $tag->color_class }} ">{{ $tag->name }}</div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="item-block__desc">
        <div class="item-block__info">
            <span>
                <svg class="icon icon-eye "><use xlink:href="/build/images/sprite-inline.svg#eye"></use></svg>
                {{ $art->views ?? 0 }}
            </span>
            <span>
                <svg class="icon icon-comment "><use xlink:href="/build/images/sprite-inline.svg#comment"></use></svg>
                0
            </span>
        </div>
        <div class="item-block__title">{{ $art->title }}</div>
        <div class="item-block__text">{{ $art->content_preview }}</div>
        <div class="item-block__date">{{ $art->date->format('d.m.Y') }}</div>
        @if($art->time_read)
            <div class="item-block__time">читать {{ $art->time_read }} мин</div>
        @endif
    </div>
</a>
