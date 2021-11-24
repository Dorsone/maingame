@if(!empty($breadcrumbs))
    <ul class="breadcrumbs">
        <li class="breadcrumbs-item"><a href="{{ route('site.index') }}">Главная</a></li>
        @foreach($breadcrumbs as $link)
            @if(!empty($link['current']))
                <li class="breadcrumbs-item current">{{ $link['title'] }}</li>
            @else
                <li class="breadcrumbs-item"><a href="{{ $link['url'] }}">{{ $link['title'] }}</a></li>
            @endif
        @endforeach
    </ul>
@endif
