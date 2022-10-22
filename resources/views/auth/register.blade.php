@extends('layouts.guest')
@section('content')
    <div class="authentication-form mx-auto">
        <div class="logo-centered">
            <div style="display: flex; justify-content: center">
            <a href="/"><img src="{{asset('assets/guest-layout/src/img/new-logo.png')}}" alt="logo" style="width: 210px;"></a>
            </div>
        </div>
        <h3>Регистрация</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input id="name"
                       type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       placeholder="имя"
                       autocomplete="name"
                       autofocus>
                <i class="ik ik-user"></i>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="surname"
                       type="text"
                       class="form-control @error('surname') is-invalid @enderror"
                       name="surname"
                       placeholder="фамилия"
                       value="{{ old('surname') }}"
                       required
                       autocomplete="surname"
                       autofocus>
                <i class="ik ik-user"></i>
                @error('surname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="email"
                       type="email"
                       placeholder="email адрес"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
                <i class="ik ik-mail"></i>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password"
                       style="position: relative;"
                       placeholder="пароль"
                       type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="new-password">
                <a href="#" class="password_show" tabindex="-1"
                   onclick="return show_password(this);"></a>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password-confirm"
                       placeholder="подтверждение пароля"
                       style="position: relative;"
                       name="password_confirmation"
                       type="password" class="form-control"
                       required
                       autocomplete="new-password">
                <a href="#" class="password_show" tabindex="-1"
                   onclick="return show_password_confirmation(this);"></a>
            </div>
            <div class="sign-btn text-center">
                <button class="btn btn-theme">Создать аккаунт</button>
            </div>
        </form>
        <div class="register">
            <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
        </div>
    </div>
@endsection
