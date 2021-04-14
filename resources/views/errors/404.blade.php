@extends('site.layout')

@section('content')
    <section class="section">
        <div class="container container__sm">
            <div class="not-found">
                <div class="not-found__title">404</div>
                <div class="title-line">
                    <h1 class="title title-h1"> Что-то пошло не так</h1>
                </div>
                <div class="sentence">Этой страницы более не существует.  Но это не Game Over, вы можете найти что-то интересное.</div>
                <form class="form form-line" action="/">
                    <input type="text" placeholder="Поиск по сайту"/>
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
            <div class="col-two"><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a><a class="item-block col" href="javascript:void(0)">
                    <div class="item-block__desc">
                        <div class="item-block__info"><span>
                    <svg class="icon icon-eye ">
                      <use xlink:href="/build/images/sprite-inline.svg#eye"></use>
                    </svg>1,247</span><span>
                    <svg class="icon icon-comment ">
                      <use xlink:href="/build/images/sprite-inline.svg#comment"></use>
                    </svg>15</span></div>
                        <div class="item-block__title">В ожидании финала зимней лиги DPC 2021</div>
                        <div class="item-block__date">12.02.21</div>
                        <div class="item-block__time">читать 15 мин</div>
                    </div></a>
            </div>
        </div>
    </section>
@endsection
