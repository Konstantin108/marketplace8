<nav class="nav center">
    <ul class="menu">
        <li class="menu__list">
            <a href="{{ route('getPromo') }}" class="menu__link">Главная</a>
        </li>
        <li class="menu__list">
            <a href="{{ route('siteIndex') }}" class="menu__link">Каталог</a>
        </li>
        <li class="menu__list">
            <a href="{{ route('myBasket') }}" class="menu__link">Корзина</a>
        </li>
        <li class="menu__list">
            <a href="{{ route('allMyOrders') }}" class="menu__link">Мои заказы</a>
        </li>
        @if(Auth::check() && Auth::user()->is_admin)
            <li class="menu__list">
                <a href="{{ route('myTasks', ['userId' => Auth::user()->id]) }}"
                   class="button" style="background-color: #0a53be">
                    Пульт админа
                </a>
            </li>
        @endif
    </ul>
</nav>
