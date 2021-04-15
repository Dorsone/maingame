<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('setting') }}">
        <i class="las la-cog nav-icon"></i> Настройки
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">Контент</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('menu') }}'> Меню</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('mainslides') }}'> Cлайдер</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('articles') }}'> Статьи</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('articlescategories') }}'> Категории статей </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('articlestags') }}'> Теги для статей</a></li>
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('elfinder') }}">Файлы</a>
        </li>
    </ul>
</li>
