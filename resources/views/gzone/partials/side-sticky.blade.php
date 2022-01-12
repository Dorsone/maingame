<div class="tournaments-submenu-block">
    <div class="sticky-block">
        <div class="caption"><a href="javascript:void(0)">EASPORT NEWS</a></div>
        <!-- add class "current" to "a" tag to make active element-->
        <ul class="games-list">
            <li><a href="{{ route('site.category', ['categorySlug' => 'cs-go']) }}">
                    <svg class="icon icon-counter-strike ">
                        <use xlink:href="{{ asset('images/sprite-inline.svg#counter-strike') }}"></use>
                    </svg>
                </a></li>
            <li><a href="{{ route('site.category', ['categorySlug' => 'dota']) }}">
                    <svg class="icon icon-dota-2 ">
                        <use xlink:href="{{ asset('images/sprite-inline.svg#dota-2') }}"></use>
                    </svg>
                </a></li>
            <li><a href="javascript:void(0)">
                    <svg class="icon icon-mortal-kombat ">
                        <use xlink:href="{{ asset('images/sprite-inline.svg#mortal-kombat') }}"></use>
                    </svg>
                </a></li>
        </ul>
        <ul class="tournaments-submenu">
            <li>
                <!-- add class "active" to "a" tag with "premium" class to make active element--><a class="premium active" href="javascript:void(0)">
                    <svg class="icon icon-ticket-star ">
                        <use xlink:href="./images/sprite-inline.svg#ticket-star"></use>
                    </svg></a>
            </li>
            <li><a href="javascript:void(0)">
                    <svg class="icon icon-discord ">
                        <use xlink:href="./images/sprite-inline.svg#discord"></use>
                    </svg></a></li>
            <li><a href="javascript:void(0)">
                    <svg class="icon icon-message ">
                        <use xlink:href="./images/sprite-inline.svg#message"></use>
                    </svg></a></li>
            <li><a href="javascript:void(0)">
                    <svg class="icon icon-question ">
                        <use xlink:href="./images/sprite-inline.svg#question"></use>
                    </svg></a></li>
        </ul>
    </div>
</div>
