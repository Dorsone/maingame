<section class="breadcrumbs-section">
    <div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="{{ route('site.index') }}">
                    <svg class="icon icon-home ">
                        <use xlink:href="/build/images/sprite-inline.svg#home"></use>
                    </svg>
                    <span>Главная</span>
                </a>
            </li>
            @if(!empty($breadcrumbs))
                @foreach($breadcrumbs as $link)
                    @if(!empty($link['current']))
                        <li class="breadcrumbs-item current"><span>{{ $link['title'] }}</span></li>
                    @else
                        <li class="breadcrumbs-item">
                            <a href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</section>
