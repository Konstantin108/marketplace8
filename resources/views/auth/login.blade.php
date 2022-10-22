@extends('layouts.guest')
@section('content')
    <div class="authentication-form mx-auto">
        <div class="logo-centered">
            <div style="display: flex; justify-content: center">
                <a href="/"><img src="{{asset('assets/guest-layout/src/img/new-logo.png')}}" alt="logo" style="width: 210px;"></a>
            </div>
        </div>
        <h3>Вход в систему</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email"
                       placeholder="email адрес или имя"
                       type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
                <i class="ik ik-user"></i>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password"
                       placeholder="пароль"
                       type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="current-password">
                <a href="#" class="password_show" tabindex="-1"
                   onclick="return show_password(this);"></a>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col text-left">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="custom-control-label">Запомнить меня</span>
                    </label>
                </div>
                <div class="col text-right">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Забыли пароль?</a>
                    @endif
                </div>
            </div>
            <div class="sign-btn text-center">
                <button class="btn btn-theme">Войти</button>
            </div>
        </form>
        <div class="register">
            <a href="{{ route('register') }}">Регистрация нового пользователя</a>
        </div>
    </div>
@endsection
