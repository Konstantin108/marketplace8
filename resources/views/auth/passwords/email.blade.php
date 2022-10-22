@extends('layouts.guest')
@section('content')
    <div class="authentication-form mx-auto">
        <div class="logo-centered">
            <div style="display: flex; justify-content: center">
                <a href="/"><img src="{{asset('assets/guest-layout/src/img/new-logo.png')}}" alt="logo" style="width: 210px;"></a>
            </div>
        </div>
        <h3>Сброс пароля</h3>
        <p>На вашу почту будет выслана ссылка для сброса пароля</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <input id="email"
                       name="email"
                       placeholder="email адрес"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       autocomplete="email"
                       value="{{ old('email') }}"
                       autofocus
                       required>
                <i class="ik ik-mail"></i>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="sign-btn text-center">
                <button class="btn btn-theme">Получить ссылку</button>
            </div>
        </form>
        <div class="register">
            <a href="{{ route('register') }}">Регистрация нового пользователя</a>
        </div>
    </div>
@endsection
