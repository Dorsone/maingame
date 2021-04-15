@extends('site.layout')
@php
    /** @var $article \App\Models\Articles */
    /** @var $recommendation \App\Models\Articles [] */
    /** @var $category \App\Models\ArticlesCategories */
    /** @var $tags \App\Models\ArticlesTags [] */
@endphp

@section('title', $article->seo_title ?? $article->title)
@section('description', $article->seo_description)
@section('keywords', $article->seo_keywords)

@section('content')

    @include('site.inc.breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    <section class="section">
        <div class="container container__xs">
            <div class="title-line">
                <h1 class="title title-h1"> {{ $article->seo_h1 ?? $article->title }}</h1>
            </div>
            <div class="news-info">
                <div class="news-info__header">

                    @if($article->user->image)
                        <div class="img-sm">
                            <img src="{{ asset($article->user->image) }}" alt=""/>
                        </div>
                    @endif

                    <div class="news-info__desc">
                        <div class="news-info__block">
                            <a class="name" href="{{ route('site.author', ['id' => $article->user->id]) }}">
                                {{ $article->user->name }}
                            </a>
                            <div class="date">{{ $article->date->format('d.m.Y') }}</div>
                            <div class="time">читать {{ $article->time_read }} мин</div>
                        </div>
                        <div class="news-info__block">
                            <span>
                                <svg class="icon icon-eye "><use xlink:href="/build/images/sprite-inline.svg#eye"></use></svg>
                                {{ $article->views }}
                            </span>
                            <span>
                                <svg class="icon icon-comment "><use xlink:href="/build/images/sprite-inline.svg#comment"></use></svg>
                                0
                            </span>
                        </div>
                    </div>
                </div>
                <div class="news-info__pic">
                    <img src="{{ asset($article->image) }}" alt=""/>
                </div>
            </div>
            <div class="news-article saved">
                <div class="news-article__actions">
                    <div class="save">
                        <svg class="icon icon-save ">
                            <use xlink:href="/build/images/sprite-inline.svg#save"></use>
                        </svg>
                    </div>
                    <a class="share" href="https://vk.com/share.php?url={{url()->current()}}">
                        <svg class="icon icon-vk ">
                            <use xlink:href="/build/images/sprite-inline.svg#vk"></use>
                        </svg>
                    </a>
                    <a class="share" href="https://www.facebook.com/sharer.php?src=sp&u={{url()->current()}}">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="/build/images/sprite-inline.svg#facebook"></use>
                        </svg>
                    </a>
                    <a class="share" href="https://plus.google.com/share?url={{url()->current()}}">
                        <svg class="icon icon-google ">
                            <use xlink:href="/build/images/sprite-inline.svg#google"></use>
                        </svg>
                    </a>
                </div>
                <div class="text">
                    {!! $article->content !!}

                    <div class="news-tags">
                        @foreach($article->tags as $tag)
                            <span>#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container container__xs">
            <div class="title-line">
                <h2 class="title title-h2"> Комментарии<span class="count">0</span></h2>
            </div>
            <div class="comment">
                <form class="form form-line" action="/">
                    <input type="text" placeholder="Ваш комментарий"/>
                    <button>
                        <svg class="icon icon-send ">
                            <use xlink:href="/build/images/sprite-inline.svg#send"></use>
                        </svg>
                    </button>
                </form>

                {{--
                <div class="comment-item">
                    <div class="comment-item__first">
                        <div class="img-sm"><img src="./images/avatar.jpg" alt=""/>
                        </div>
                        <div class="comment-item__desc">
                            <div class="comment-item__name">Evan J.</div>
                            <div class="comment-item__text text">
                                <p>Главным же победителем является Dark Seer: его Normal Punch — это отсылка к JoJo's Bizarre Adventure!</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-item__answer">
                        <svg class="icon icon-arrow-reply ">
                            <use xlink:href="./images/sprite-inline.svg#arrow-reply"></use>
                        </svg>
                        <span>Ответить</span>
                    </div>
                </div>
                <div class="comment-item">
                    <div class="comment-item__first">
                        <div class="img-sm"><img src="./images/avatar.jpg" alt=""/>
                        </div>
                        <div class="comment-item__desc">
                            <div class="comment-item__name">Evan J.</div>
                            <div class="comment-item__text text">
                                <p>Ястребом вновь можно управлять, выполняя более качественную разведку. Более того, он еще и стал камикадзе, наносящим урон по оппоненту и станящим
                                    его. Главным же победителем является Dark Seer: его Normal Punch — это отсылка к JoJo's Bizarre Adventure!</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-item__answer">
                        <svg class="icon icon-arrow-reply ">
                            <use xlink:href="./images/sprite-inline.svg#arrow-reply"></use>
                        </svg>
                        <span>Ответить</span>
                    </div>
                    <div class="comment-item__second">
                        <div class="img-sm"><img src="./images/avatar.jpg" alt=""/>
                        </div>
                        <div class="comment-item__desc">
                            <div class="comment-item__name">Evan J.</div>
                            <div class="comment-item__text text">
                                <p>Ястребом вновь можно управлять, выполняя более качественную разведку. Более того, он еще и стал камикадзе, наносящим урон по оппоненту и станящим
                                    его. Главным же победителем является Dark Seer: его Normal Punch — это отсылка к JoJo's Bizarre Adventure!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-item">
                    <div class="comment-item__first">
                        <div class="img-sm"><img src="./images/avatar.jpg" alt=""/>
                        </div>
                        <div class="comment-item__desc">
                            <div class="comment-item__name">Evan J.</div>
                            <div class="comment-item__text text">
                                <p>Главным же победителем является Dark Seer: его Normal Punch — это отсылка к JoJo's Bizarre Adventure!</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-item__answer">
                        <svg class="icon icon-arrow-reply ">
                            <use xlink:href="./images/sprite-inline.svg#arrow-reply"></use>
                        </svg>
                        <span>Ответить</span>
                    </div>
                </div>
                --}}
            </div>
            <div class="link-more" data-url="">
                <svg class="icon icon-arrow-circle ">
                    <use xlink:href="./images/sprite-inline.svg#arrow-circle"></use>
                </svg>
                <span>Еще 11 комментариев </span>
            </div>
        </div>
    </section>

    @if($recommendation->isNotEmpty())
        <section class="section">
            <div class="container container__sm">
                <div class="title-line">
                    <div class="title title-h2"> Похожие статьи</div>
                </div>
                <div class="col-two">
                    @foreach($recommendation as $recomm)
                        @include('site.inc.article-item', ['art' => $recomm, 'cat' => $recomm->category])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
