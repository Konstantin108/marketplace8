@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <h1>Список всех пользователей</h1>
        <div style="width: 30px; height: 30px;"></div>
        <a href="{{route('createUser')}}">Добавить пользователя</a>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; width: 60px;">Аватар</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
            <th style="border: 2px solid black">Имя</th>
            <th style="border: 2px solid black">Фамилия</th>
            <th style="border: 2px solid black">Почта</th>
            <th style="border: 2px solid black">Права админа</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
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
                    <a href="{{route('user', ['id' => $user->id, 'link' => 1, 'order_id' => 0])}}">
                        перейти
                    </a>
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
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
