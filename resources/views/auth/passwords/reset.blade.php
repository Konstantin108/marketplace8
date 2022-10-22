@extends('layouts.guest')

@section('content')
    <div class="authentication-form mx-auto">
        <div class="logo-centered">
            <div style="display: flex; justify-content: center">
                <a href="/"><img src="{{asset('assets/guest-layout/src/img/new-logo.png')}}" alt="logo" style="width: 210px;"></a>
            </div>
        </div>
        <h3>Установите новый пароль</h3>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input id="email"
                       type="email"
                       placeholder="email адрес"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ $email ?? old('email') }}"
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
                <button class="btn btn-theme">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
