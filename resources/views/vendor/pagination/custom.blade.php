@if ($paginator->hasPages())
    <div class="pagination pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination__prev" href="javascript:void(0)"></a>
        @else
            <a class="pagination__prev" href="{{ $paginator->previousPageUrl() }}"></a>
        @endif

        @if($paginator->currentPage() > 3)
            <a class="pagination__item" href="{{ $paginator->url(1) }}">1</a>
        @endif
        @if($paginator->currentPage() > 4)
            <a class="pagination__item pagination__item_dash" href="javascript:void(0)"></a>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <a class="pagination__item current" href="javascript:void(0)">{{ $i }}</a>
                @else
                    <a class="pagination__item" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <a class="pagination__item pagination__item_dash" href="javascript:void(0)"></a>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <a class="pagination__item" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination__next" href="{{ $paginator->nextPageUrl() }}"></a>
        @else
            <a class="pagination__next" href="javascript:void(0)"></a>
        @endif
    </div>
@endif
