@extends('gzone.layouts.main')
@section('header')
    @include('gzone.partials.header-secondary')
@endsection
@section('content')
    <main class="page-404">
        <div class="page-404__body">
            <div class="background-img"><img src="{{ asset('images/image-36.jpg') }}" alt=""/>
            </div>
            <div class="fog-img"><img src="{{ asset('images/fog.png') }}" alt=""/>
            </div>
            <div class="tournaments-submenu-block">
                <div class="sticky-block">
                    <div class="caption"><a href="javascript:void(0)">EASPORT NEWS</a></div>
                    <!-- add class "current" to "a" tag to make active element-->
                    <ul class="games-list">
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-counter-strike ">
                                    <use xlink:href="./images/sprite-inline.svg#counter-strike"></use>
                                </svg></a></li>
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-dota-2 ">
                                    <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                                </svg></a></li>
                        <li><a href="javascript:void(0)">
                                <svg class="icon icon-mortal-kombat ">
                                    <use xlink:href="./images/sprite-inline.svg#mortal-kombat"></use>
                                </svg></a></li>
                    </ul>
                </div>
            </div>
            <div class="page-404__inner">
                <div class="page-404__main">
                    <div class="page-404__desc">
                        <p class="title-h3">Страница не найдена</p><a class="button" href="{{ route('site.index') }}">На главную</a>
                    </div>
                    <div class="page-404__img-404"><img src="{{ asset('images/image-37.png') }}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('gzone.partials.footer')
@endsection
