@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <table class="table table-bordered">
        <div style="display: flex; align-items: center">
            <h1 style="margin-right: 50px;">Все задачи</h1>
            @if( $filter == '1' )
                <h4>(новые задачи)</h4>
            @elseif( $filter == '2' )
                <h4>(задачи в работе)</h4>
            @elseif( $filter == '3' )
                <h4>(выполненные задачи)</h4>
            @elseif( $filter == '4' )
                <h4>(задачи с ошибкой)</h4>
            @endif
        </div>
        <div style="display: flex; justify-content: space-between; width: 500px; align-items: center">
            <h4>Фильтр:</h4>
            <a href="{{route('index', ['filter' => '1'])}}">новые</a>
            <a href="{{route('index', ['filter' => '2'])}}">в работе</a>
            <a href="{{route('index', ['filter' => '3'])}}">выполненные</a>
            <a href="{{route('index', ['filter' => '4'])}}">закрытые с ошибкой</a>
        </div>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black">
        <tr style="border: 2px solid black">
            <th style="border: 2px solid black">#ID</th>
            <th style="border: 2px solid black; color: blue">Ссылка</th>
            <th style="border: 2px solid black">Создатель</th>
            <th style="border: 2px solid black">Имя задачи</th>
            <th style="border: 2px solid black">Статус</th>
            <th style="border: 2px solid black">Комментарий</th>
            <th style="border: 2px solid black">Уникальный ключ</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->id }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; display: flex; justify-content: space-around">
                    <a href="{{route('show', ['id' => $task->id, 'msg' => $msg, 'link' => '1', 'filter' => $filter])}}">
                        перейти
                    </a>
                    <a href="{{route('deleteTask', ['id' => $task->id, 'link' => '1', 'filter' => $filter])}}">
                        удалить
                    </a>
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">
                    {{ $task->user_name }}
                </td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->task_name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->status }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->comment }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black">{{ $task->key }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутсвтуют</td>
    @endforelse
    {{$tasks->links()}}

@endsection
