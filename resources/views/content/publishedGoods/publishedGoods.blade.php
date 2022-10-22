@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <h1>Список опубликованных товаров</h1>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">LINK</th>
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
        @forelse($publishedGoods as $publishedGood)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    <a href="{{route('oneGood', [
                            'id' => $publishedGood->id,
                            'link' => 1,
                            'order_id' => 0
                            ])}}">
                        перейти
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $publishedGood->table_id }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->price }}
                    &#8381;
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->info }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->sex }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->category }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->brand }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->designer }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->size }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $publishedGood->sale }}</td>
                <td style="width: 60px; border-bottom: 2px solid black; border-right: 1px solid black">
                    @if($publishedGood->img)
                        <img src="{{ \Storage::disk('public')->url( $publishedGood->img) }}" alt="avatar"
                             style="width: 50px; border-radius: 50%">
                    @else
                        <img src="/img/no_photo.jpg" alt="avatar" style="width: 50px; border-radius: 50%">
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        @endforelse
        </tbody>
    </table>

@endsection
