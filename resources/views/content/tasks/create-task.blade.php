@extends('layouts.main')
@section('content')

    <form action="{{ route('store') }}"
          method="post"
    >
        @csrf
        @method('POST')
        <h1>Задайте имя новой задаче</h1>
        <div style="display: flex;">
            <div>
                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    style="width: 560px;"
                    @error('task_name')
                    style="border: red 1px solid;"
                    @enderror
                    autocomplete="off"
                >
            </div>
            <div>
                @if($errors->has('task_name'))
                    @foreach($errors->get('task_name') as $error)
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
        <button
            type="submit"
            style="color: white;
                       background-color: #2D3748;
                       padding: 6px;
                       border-radius: 10px;
                       margin-top: 14px;
                       outline: none;
                ">
            Сохранить
        </button>
    </form>

@endsection
