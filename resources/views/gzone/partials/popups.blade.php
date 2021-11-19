<div class="popup popup__searching">
    <button class="searching__close-btn">
        <svg class="icon icon-close1 ">
            <use xlink:href="./images/sprite-inline.svg#close1"></use>
        </svg>
    </button>
    <div class="container-sides-lg">
        <div class="container-sm">
            <form method="get" class="searching__form" action="{{ route('site.search') }}">
                <input name="q" class="searching__form-input" type="text" placeholder="Поиск"/>
                <button class="searching__form-btn">
                    <svg class="icon icon-search ">
                        <use xlink:href="{{ asset('/images/sprite-inline.svg#search') }}"></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
