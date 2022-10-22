@extends('layouts.main')
@section('content')

    <p>{{$msg}}</p>
    <h1>Задача "{{$task->task_name}}"</h1>
    <p>ID: {{$task->id}}, ключ: {{$task->key}}</p>
    <p>Статус: {{$task->status}}</p>

    <form method="post" action="{{route('taskEdit', ['id' => $task->id, 'link' => $link, 'filter' => $filter])}}">
        @csrf
        @method('PUT')
        @if($task->status == 'в работе' || $task->status == 'новая')
            <div style="display: flex">
                <h4>Закрыть задачу</h4>
                <div>
                    @if($errors->has('status'))
                        @foreach($errors->get('status') as $error)
                            <span
                                style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                        @endforeach
                    @endif
                </div>
            </div>
            <input
                type="text"
                id="comment"
                name="comment"
                style="width: 560px;"
                @error('comment')
                style="border: red 1px solid;"
                @enderror
                value="{{$task->comment}}"
                placeholder="комментарий"
                autocomplete="off"
            >
            <input type="radio"
                   name="status"
                   id="in_process"
                   value="1">
            <label for="in_process">выполнена</label>
            <input type="radio"
                   name="status"
                   id="fail"
                   value="2">
            <label for="fail">ошибка</label>

            <div style="display: flex">
                <button
                    type="submit"
                    style="color: white;
                       background-color: #2D3748;
                       border-radius: 10px;
                       margin-top: 14px;
                       text-align: center;
                       outline: none;
                       width: 100px;
                       height: 30px;
                       margin-right: 4px;
                ">
                    Сохранить
                </button>
            </div>
        @else
            <div>
                <h4>Задача закрыта</h4>
                <span>Комментарий: </span><span> {{$task->comment}}</span>
            </div>
        @endif
    </form>
    <a
        type="submit"
        href="{{route('back', ['link' => $link, 'filter' => $filter])}}"
        style="color: white;
                       background-color: #2D3748;
                       padding-top: 3px;
                       text-align: center;
                       border-radius: 10px;
                       margin-top: 14px;
                       outline: none;
                       width: 100px;
                       height: 30px;
                ">
        Назад
    </a>

@endsection
