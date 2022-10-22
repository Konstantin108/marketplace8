@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <h1>Один пользователь</h1>
        <div style="width: 30px; height: 30px;"></div>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; width: 60px;">Аватар</th>
            <th style="border: 2px solid black">Имя</th>
            <th style="border: 2px solid black">Фамилия</th>
            <th style="border: 2px solid black">Почта</th>
            <th style="border: 2px solid black">Права админа</th>
        </tr>
        </thead>
        <tbody>
        <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->id }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black; width: 60px;">
                @if($user->avatar)
                    <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" alt="avatar"
                         style="width: 50px; border-radius: 50%">
                @else
                    <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                @endif
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                {{ $user->name }}
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                {{ $user->surname }}
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $user->email }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                @if($user->is_admin)
                    да
                @else
                    нет
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    @if(!$user->is_admin)
        <a href="{{ route('editUser', ['id' => $user->id, 'link' => $link, 'order_id' => $order_id]) }}">Редактировать</a>
        <a href="{{route('deleteUser', ['id' => $user->id, 'link' => $link])}}">Удалить</a>
    @endif
    <a href="{{route('backForUser', ['link' => $link, 'order_id' => $order_id])}}">Назад</a>
@endsection
