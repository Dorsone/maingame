@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

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
    <main class="article-page">
        <div class="container-sides-lg">
            @if(url()->previous())
                <div class="back-link">
                    <div class="line"></div>
                    <a href="{{ route('site.categories') }}">Вернуться</a>
                </div>
            @endif
            <div class="container-md2">
                @include('gzone.partials.breadcrumbs')
            </div>
            <div class="container-sm">
                <div class="article-page-inner">
                    <div class="text">
                        <div class="article__tags">
                            @if($article->tags->isNotEmpty())
                                <div class="hashtags">
                                    @foreach($article->tags as $tag)
                                        <a href="{{route('site.categories', $tag->slug)}}"
                                           class="{{ $tag->color_class }}">#{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="article__action bookmark">
                                <svg class="icon icon-mark ">
                                    <use xlink:href="{{asset('images/sprite-inline.svg#mark')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <h1 class="title-h2">{{ $article->seo_h1 ?? $article->title }}</h1>
                        <div class="article__info">
                            <div class="article__author">
                                <div class="article__author-img"><img src="{{ asset($article->user->image) }}" alt=""/>
                                </div>
                                <a class="article__author-name" href="{{ route('author.index', $article->user->id) }}">{{ $article->user->name }}</a>
                            </div>
                            <div class="see">
                                <svg class="icon icon-eye ">
                                    <use xlink:href="{{ asset('images/sprite-inline.svg#eye') }}"></use>
                                </svg>
                                <span>{{ $article->views }}</span>
                            </div>

                            <a class="article__author-name" href="{{ route('author.index', $article->user->id) }}">{{ $article->user->name }}</a>

                            <span class="article__reading">Читать {{ $article->time_read }} мин</span>

                        </div>
                        <div class="article__img" style="margin-bottom: 45px;">
                            <div class="article__img-wrapper">
                                <img src="{{ asset($article->image) }}" alt=""/>
                            </div>
                        </div>
                        {!! $article->content !!}
                        <div class="article__share">
                            <span>Поделиться:</span>
                            <a class="article__share__link" href="https://www.facebook.com/sharer.php?src=sp&u={{url()->current()}}">
                                <svg class="icon icon-facebook ">
                                    <use xlink:href="{{ asset('images/sprite-inline.svg#facebook') }}"></use>
                                </svg>
                            </a>
                            <a class="article__share__link" href="https://vk.com/share.php?url={{url()->current()}}">
                                <svg class="icon icon-vkontakte">
                                    <use xlink:href="{{ asset('images/sprite-inline.svg#vkontakte') }}"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="comment">
                        <h2 class="title-h3">Комментарии <span>{{ $article->comments->count() }}</span></h2>
                        @foreach($article->comments as $comment)
                            <div class="comment-block">
                                <div class="comment-head">
                                    <div class="comment-head-pic"><img src="https://www.gravatar.com/avatar/{{ md5($comment->email) }}" alt=""/>
                                    </div>
                                    <div class="comment-head-info">
                                        <div class="comment-head-name">{{ $comment->name }}</div>
                                        <div class="comment-head-time"><span>{{ $comment->created_at->format('H:i') }}</span><span>{{ $comment->created_at->format('d M. Y') }}</span></div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <p>{{ $comment->comment }}</p>
                                </div>
                                @auth
{{--                                    <div class="comment-btn button button_transp-hover comment-item__answer">Ответить</div>--}}
                                @endauth
                            </div>
                            @if($comment->answer)
                            <div class="comment-block comment-block--answear">
                                <div class="comment-head">
                                    <div class="comment-head-pic">
                                        @if($article->user->image)
                                        <img src="{{ asset($article->user->image) }}" alt=""/>
                                        @endif
                                    </div>
                                    <div class="comment-head-info">
                                        <div class="comment-head-name">{{ $article->user->name }}</div>
                                        <div class="comment-head-time"><span>{{ $comment->created_at->format('H:i') }}</span><span>{{ $comment->created_at->format('d M. Y') }}</span></div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <p>{{ $comment->answer }}</p>
                                </div>
                                <div class="comment-btn button button_transp-hover">Ответить</div>
                            </div>
                            @endif
                        @endforeach
                        <div class="comment-empty" id="message-box" style="display: none">
                            <p>Ваш комментарий получен и будет показан после модерации</p>
                            <div class="comment-empty-icon">
                                <svg class="icon icon-maingame ">
                                    <use xlink:href="{{ asset('images/sprite-inline.svg#maingame') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="comment-block">
                            <form class="comment-form js-send-form"
                                  method="post"
                                  data-success-block="comment-add-done"
                                  action="{{ route('site.add-comment') }}">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <div class="comment-form-col">
                                    <div class="comment-form-field">
                                        <input type="text" name="name" placeholder="Имя" required/>
                                    </div>
                                    <div class="comment-form-field">
                                        <input type="email" name="email" placeholder="E-mail" required/>
                                    </div>
                                </div>
                                <div class="comment-form-col">
                                    <div class="comment-form-field">
                                        <textarea rows="4" name="comment" placeholder="Комментарий" required></textarea>
                                    </div>
                                </div>
                                <button class="comment-form-reset" type="reset">Отменить</button>
                                <button class="comment-form-submit" type="submit">Добавить комментарий</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($recommendation->isNotEmpty())
            <div class="container-md2">
                    <div class="top-articles-title">
                        <h2 class="title-h2">Рекомендуем почитать</h2>
                    </div>
                    <div class="popular-articles__wrapper">
                        @foreach($recommendation as $recomm)
                        <div class="article-preview">
                            <div class="article-preview__img">
                                <a href="{{ route('site.article', ['categorySlug' => $recomm->category->slug, 'articleSlug' => $recomm->slug]) }}">
                                    <img src="{{ asset($recomm->image) }}" alt=""/>
                                </a>
                            </div>
                            <div class="article-preview__tags">
                                @if($recomm->tags->isNotEmpty())
                                    <div class="hashtags">
                                        @foreach($recomm->tags as $tag)
                                            <a href="{{route('site.categories', $tag->slug)}}"
                                               class="{{ $tag->color_class }}">#{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="article-preview__action">
                                    <div class="see">
                                        <svg class="icon icon-eye ">
                                            <use xlink:href="{{ asset('images/sprite-inline.svg#eye') }}"></use>
                                        </svg>
                                        <span>{{ $recomm->views }}</span>
                                    </div>
                                    <div class="comment">
                                        <svg class="icon icon-comment ">
                                            <use xlink:href="{{ asset('images/sprite-inline.svg#comment') }}"></use>
                                        </svg>
                                        <span>{{ $recomm->comments->count() }}</span>
                                    </div>
                                    <div class="bookmark">
                                        <svg class="icon icon-mark ">
                                            <use xlink:href="{{ asset('images/sprite-inline.svg#mark') }}"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <a class="article-preview__caption" href="{{ route('site.article', ['categorySlug' => $recomm->category->slug, 'articleSlug' => $recomm->slug]) }}">{{ $recomm->title }}</a>
                            <div class="article-preview__info">
                                <div class="article-preview__author">
                                    <div class="article-preview__author-img"><img src="{{ asset($recomm->user->image) }}" alt=""/>
                                    </div>
                                    <a class="article-preview__author-name" href="{{ route('author.index', $recomm->user->id) }}">{{ $recomm->user->name }}</a>
                                </div>
                                <span class="article-preview__reading">Читать {{ $recomm->time_read }} мин</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
            @endif
        </div>
        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection

@section('js')
    <script>
        $('.js-send-form').on('submit', function (e) {
            e.preventDefault();
            let form = $(this)
            let url = form.attr('action')
            let successMessageBlock = form.attr('data-success-block')

            $.ajax({
                url: url,
                data: form.serialize(),
                type: form.attr('method'),
                dataType: "json",
                beforeSend: function () {
                    if (typeof successMessageBlock !== 'undefined') {
                        $('.' + successMessageBlock).hide();
                    }
                },
                complete: function () {

                },
                error: function (jqXHR, exception) {
                    console.log(jqXHR, exception)
                },
                success: function (response) {
                    $('#message-box').show();
                    setTimeout(function (){
                        $('#message-box').slideUp();
                    }, 4000);
                    form.trigger("reset");
                }
            });
        });
    </script>
@endsection
