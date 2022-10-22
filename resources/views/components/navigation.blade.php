<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button style="margin-right: 12px;" class="btn btn-primary" id="sidebarToggle">Меню</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
        </button>
        <a style="margin-right: 12px;" href="{{ route('siteIndex') }}">Главная</a>
        <a style="margin-right: 12px;" href="{{ route('myBasket') }}">Корзина</a>
        <a style="margin-right: 12px;" href="{{ route('allMyOrders') }}">Мои заказы</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::check())
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('myProfile', ['id' => Auth::user()->id]) }}">
                                {{ __('Профиль') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ url('/home') }}"
                                           class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="text-sm text-gray-700 dark:text-gray-500 underline">Вход</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </ul>
                    @endif
                    {{--                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>--}}
                    {{--                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>--}}
                    {{--                <li class="nav-item dropdown">--}}
                    {{--                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"--}}
                    {{--                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
                    {{--                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
                    {{--                        <a class="dropdown-item" href="#!">Action</a>--}}
                    {{--                        <a class="dropdown-item" href="#!">Another action</a>--}}
                    {{--                        <div class="dropdown-divider"></div>--}}
                    {{--                        <a class="dropdown-item" href="#!">Something else here</a>--}}
                    {{--                    </div>--}}
                    {{--                </li>--}}
                </ul>
        </div>
    </div>
</nav>
