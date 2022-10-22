@extends('layouts.prod')
@section('content')

    <nav class="arrivals_product center">
        <h2 class="arrivals_title">Мой профиль</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </nav>

    <div class="main_content center" style="padding-left: 36%; margin-top: 30px;">
        <div style="display: flex; flex-direction: column; justify-content: center">
            <div style="display:flex;
                        justify-content: flex-start;
                        margin-bottom: 20px;">
                @if($user->avatar)
                    <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                         style="width: 200px;">
                @else
                    <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                @endif
                <div style="width: 300px; margin-left: 20px;">
                    <h4>Имя</h4>
                    <p style="margin-left: 50px;"> {{ $user->name }}</p>
                    <h4>Фамилия</h4>
                    <p style="margin-left: 50px;"> {{ $user->surname }}</p>
                    <h4>Email-адрес</h4>
                    <p style="margin-left: 50px;"> {{ $user->email }}</p>
                </div>
            </div>
            <div style="display: flex">
                <a class="button" style="padding-bottom: 40px; text-align: center; vertical-align: center"
                   href="{{ route('editProfile') }}">Редактировать</a>
                <a class="button" style="padding-bottom: 40px; text-align: center; vertical-align: center"
                   href="{{route('siteIndex')}}">Назад</a>
            </div>
        </div>
    </div>

@endsection
