@extends('layouts.main')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    <h1>Удаление задачи "{{$task->task_name}}"</h1>
    <p>ID: {{$task->id}}, ключ: {{$task->key}}</p>
    <p>Статус: {{$task->status}}</p>
    <a
        type="submit"
        href="{{route('destroy', ['id' => $task->id, 'link' => $link, 'filter' => $filter])}}"
        style="color: white;
                       background-color: #2D3748;
                       padding-top: 3px;
                       border-radius: 10px;
                       margin-top: 14px;
                       text-align: center;
                       outline: none;
                       width: 100px;
                       height: 30px;
                ">
        Удалить
    </a>
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
