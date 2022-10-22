<header class="header center">
    <div class="header__left">
        <a class="logo" href="{{ route('getPromo') }}">
            <img src="{{asset('assets/prod-images/logo.png')}}"
                 alt="logo"
                 class="logo__img"><span
                class="bran_weight">BRAN</span><span class="special__color_logo">D</span>
        </a>
    </div>
    <div class="header__right">
        <ul>
            <li class="cart_summary"><a href="{{ route('myBasket') }}">
                    <img class="header__cart"
                         src="{{asset('assets/prod-images/cart.svg')}}"
                         alt="cart">
                </a>
            </li>
        </ul>
        <div style="position: relative; width: 150px;height: 50px; cursor: pointer">
            <span class="button" id="accountBtn">
                @if(Auth::check())
                    {{ Auth::user()->name }}
                @else
                    Авторизуйтесь
                @endif
            </span>
            <div class="drop__cart" id="accountDropMenu" style="position: absolute; display: none">
                @if(Auth::check())
                    <div class="drop__flex">
                        <ul class="drop__il">
                            <li class="drop__list drop__list_cart">
                                <a class="dropdown-item"
                                   href="{{ route('myProfile', ['id' => Auth::user()->id]) }}">
                                    {{ __('Профиль') }}
                                </a>
                            </li>
                            <li class="drop__list drop__list_cart">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="drop__flex">
                        <ul class="drop__il">
                            <li class="drop__list drop__list_cart">
                                <a href="{{ route('login') }}"
                                   class="text-sm text-gray-700 dark:text-gray-500 underline">Вход</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<script>
    let accountDropMenu = document.querySelector('#accountDropMenu'),
        accountBtn = document.querySelector("#accountBtn");
    accountBtn.addEventListener("click", function () {
        if (accountDropMenu.style.display === "block") {
            accountDropMenu.style.display = "none";
        } else {
            accountDropMenu.style.display = "block";
        }
    })
</script>
