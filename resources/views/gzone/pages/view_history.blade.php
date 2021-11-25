@extends('gzone.layouts.main')

@section('header')
    @include('gzone.partials.header-secondary')
@endsection

@section('content')
    <main class="account-page">
        @include('gzone.partials.side-sticky')
        <div class="container">
            <div class="back-link">
                <div class="line"></div><a href="javascript:void(0)">Вернуться</a>
            </div>
            <div class="container-md1">
                <div class="account-info">
                    <div class="account-info-actions">
                        <button class="account-info-btn" type="button">
                            <svg class="icon icon-edit ">
                                <use xlink:href="./images/sprite-inline.svg#edit"></use>
                            </svg>Редактировать профиль
                        </button>
                        <button class="account-info-btn" type="button">
                            <svg class="icon icon-image ">
                                <use xlink:href="./images/sprite-inline.svg#image"></use>
                            </svg>Изменить обложку
                        </button>
                    </div>
                    <div class="account-info-cover">
                        <!--<img src="./images/arena-main-bg.png" alt="">-->
                    </div>
                    <div class="account-info-desc">
                        <div class="account-info-avatar"></div>
                        <div class="account-info-name">
                            <p>Mirror111</p>
                            <div class="account-info-date">Играет с 21 июля 2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="container-md1">
                    <div class="account-main">
                        <div class="account-menu"><a class="account-menu-link" href="javascript:void(0)">
                                <svg class="icon icon-bookmark ">
                                    <use xlink:href="./images/sprite-inline.svg#bookmark"></use>
                                </svg>Мои закладки</a><a class="account-menu-link account-menu-link--current" href="javascript:void(0)">
                                <svg class="icon icon-calendar1 ">
                                    <use xlink:href="./images/sprite-inline.svg#calendar1"></use>
                                </svg>История просмотров</a><a class="account-menu-link" href="javascript:void(0)">
                                <svg class="icon icon-category ">
                                    <use xlink:href="./images/sprite-inline.svg#category"></use>
                                </svg>Мои устройства</a><a class="account-menu-link account-menu-link--premium" href="javascript:void(0)">
                                <svg class="icon icon-ticket ">
                                    <use xlink:href="./images/sprite-inline.svg#ticket"></use>
                                </svg>Премиум</a>
                            <hr><a class="account-menu-link" href="javascript:void(0)">
                                <svg class="icon icon-setting ">
                                    <use xlink:href="./images/sprite-inline.svg#setting"></use>
                                </svg>Настройки аккаунта</a><a class="account-menu-link" href="javascript:void(0)">
                                <svg class="icon icon-logout ">
                                    <use xlink:href="./images/sprite-inline.svg#logout"></use>
                                </svg>Выйти</a>
                        </div>
                        <div class="account-content">
                            <div class="account-title-block">
                                <h1 class="title-h3">История просмотров</h1>
                                <form class="account-search-form" action="#">
                                    <button>
                                        <svg class="icon icon-search ">
                                            <use xlink:href="./images/sprite-inline.svg#search"></use>
                                        </svg>
                                    </button>
                                    <input type="text" placeholder="Что-то ищешь?">
                                </form>
                            </div>
                            <div class="account-my-bookmarks">
                                <div class="article-preview">
                                    <button class="bookmark-remove-btn">
                                        <svg class="icon icon-close1 ">
                                            <use xlink:href="./images/sprite-inline.svg#close1"></use>
                                        </svg>
                                    </button>
                                    <div class="article-preview__img"><a href="javascript:void(0)"><img src="./images/image-20.png" alt=""></a></div>
                                    <div class="article-preview__tags">
                                        <div class="hashtags"><a href="javascript:void(0)">#WEPLAY! VIDEO</a><a href="javascript:void(0)">#DOTA 2</a></div>
                                    </div><a class="article-preview__caption" href="javascript:void(0)">ODPixel - Techies (feat. BSJ) (Official Video)</a>
                                    <p class="article-preview__text">Вигго, Мадс и другие киберспортивные тезки знаменитых актеров</p>
                                    <div class="article-preview__info">
                                        <div class="article-preview__author">
                                            <div class="article-preview__author-img"><img src="./images/post-author-2.png" alt="">
                                            </div><a class="article-preview__author-name" href="javascript:void(0)">Элизбар Рамазашвили</a>
                                        </div><span class="article-preview__reading">Читать 1 мин</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('gzone.partials.social-links')
    </main>
    @include('gzone.partials.footer')
@endsection
