<div class="tournaments-submenu-block">
    <div class="sticky-block">
        <div class="caption"><a href="javascript:void(0)">EASPORT NEWS</a></div>
        <!-- add class "current" to "a" tag to make active element-->
        <ul class="games-list">
            <li><a href="{{ route('site.category', ['categorySlug' => 'cs-go']) }}">
                    <svg class="icon icon-counter-strike ">
                        <use xlink:href="./images/sprite-inline.svg#counter-strike"></use>
                    </svg>
                </a></li>
            <li><a href="{{ route('site.category', ['categorySlug' => 'dota']) }}">
                    <svg class="icon icon-dota-2 ">
                        <use xlink:href="./images/sprite-inline.svg#dota-2"></use>
                    </svg>
                </a></li>
            <li><a href="javascript:void(0)">
                    <svg class="icon icon-mortal-kombat ">
                        <use xlink:href="./images/sprite-inline.svg#mortal-kombat"></use>
                    </svg>
                </a></li>
        </ul>
    </div>
</div>
