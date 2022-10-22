@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <h1>Артикул №{{$good->table_id}}</h1>
        <thead style="border: 2px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black">ID товара</th>
            <th style="border: 2px solid black">Наименование</th>
            <th style="border: 2px solid black">Цена</th>
            <th style="border: 2px solid black">Информация</th>
            <th style="border: 2px solid black">Пол</th>
            <th style="border: 2px solid black">Категория</th>
            <th style="border: 2px solid black">Бренд</th>
            <th style="border: 2px solid black">Дизайнер</th>
            <th style="border: 2px solid black">Размер</th>
            <th style="border: 2px solid black">Акция</th>
            <th style="border: 2px solid black; width: 60px;">Фото</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->id }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                {{ $good->table_id }}
            </td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->name }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->price }}&#8381;</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->info }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->sex }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->category }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->brand }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->designer }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->size }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $good->sale }}</td>
            <td style="width: 60px; border-bottom: 2px solid black; border-right: 1px solid black">
                @if($good->img)
                    <img src="{{ \Storage::disk('public')->url( $good->img) }}" alt="avatar"
                         style="width: 50px; border-radius: 50%">
                @else
                    <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                @endif
            </td>
        </tr>
        </tbody>
    </table>

    <a href="{{route('edit', ['id' => $good->id])}}">Редактировать</a>
    <a href="{{ route('deleteGood', ['id' => $good->id]) }}">Удалить</a>
    <a href="{{route('goods')}}">Назад</a>

@endsection
