@extends('site.layout')

@section('content')
    <section class="section">
        <div class="container container__sm">
            <div class="not-found">
                <div class="not-found__title">404</div>
                <div class="title-line">
                    <h1 class="title title-h1"> Что-то пошло не так</h1>
                </div>
                <div class="sentence">Этой страницы более не существует. Но это не Game Over, вы можете найти что-то интересное.</div>
                <form method="get" class="form form-line" action="{{ route('site.search') }}">
                    <input name="q" type="text" placeholder="Поиск по сайту"/>
                    <button>
                        <svg class="icon icon-search ">
                            <use xlink:href="{{ asset('build/images/sprite-inline.svg#search') }}"></use>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container container__sm">
            <div class="title-line">
                <div class="title title-h2"> Похожие статьи</div>
            </div>
            <div class="col-two">
                @foreach($articles as $recomm)
                    @include('site.inc.article-item', ['art' => $recomm, 'cat' => $recomm->category])
                @endforeach
            </div>
        </div>
    </section>
@endsection
