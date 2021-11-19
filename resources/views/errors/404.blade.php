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
            @include('gzone.partials.side-sticky')
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
