@extends('layouts.main')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-6 offset-2">
                @if($errors->any() || session()->has('errorNewPass') || session()->has('errorOldPass'))
                    <div class="alert alert-danger">Присутствуют ошибки заполнения формы</div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                @endif
                <form method="post" action="{{route('storeUser')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="position: relative; max-width: 494px;">
                        <label for="avatar">Аватар пользователя</label>
                        <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
                        >
                            <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                        </div>
                        <input type="file" id="avatar" name="avatar" class="form-control" style="width: 500px;">
                        <input type="button"
                               id="clear"
                               class="delete_icon"
                               style="position: absolute; top: 252px;"
                        >
                    </div>
                    <script>
                        let control = document.querySelector("#avatar"),
                            clearBn = document.querySelector("#clear");
                        clearBn.addEventListener("click", function () {
                            control.value = '';
                            let newControl = control.cloneNode(true)
                            control.replaceWith(newControl);
                            control = newControl;
                        });
                    </script>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="name">Имя пользователя</label>
                        <input type="text"
                               id="name"
                               name="name"
                               @error('name') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('name')}}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <span style="color: red">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="surname">Фамилия пользователя</label>
                        <input type="text"
                               id="surname"
                               name="surname"
                               @error('surname') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('surname')}}">
                        @if($errors->has('surname'))
                            @foreach($errors->get('surname') as $error)
                                <span style="color: red">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <label for="email">Почта</label>
                        <input type="text"
                               id="email"
                               name="email"
                               @error('email') style="border: red 1px solid;" @enderror
                               class="form-control"
                               value="{{old('email')}}">
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                <span style="color: red">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password"
                               style="position: relative;
                             padding-left: 30px;"
                               placeholder="пароль"
                               type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required
                               autocomplete="new-password">
                        <a href="#" class="password_show" tabindex="-1"
                           onclick="return show_password(this);"></a>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password-confirm"
                               placeholder="подтверждение пароля"
                               style="position: relative;
                                padding-left: 30px;"
                               name="password_confirmation"
                               type="password" class="form-control"
                               required
                               autocomplete="new-password">
                        <a href="#" class="password_show" tabindex="-1"
                           onclick="return show_password_confirmation(this);"></a>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                        <input type="radio"
                               name="is_admin"
                               id="in_process"
                               value="1">
                        <label for="is_admin">админ</label>
                        <input type="radio"
                               name="is_admin"
                               id="in_process"
                               value="0">
                        <label for="is_admin">пользователь</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
                <a href="{{route('users')}}">Назад</a>
            </div>
        </div>
    </div>
    <style>

        .delete_icon {
            position: absolute;
            top: 37px;
            right: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            border-style: none;
            background: url({{ asset('assets/guest-layout/img/delete_icon.svg') }}) 0 0 no-repeat;

        }
    </style>
    <script>
        function show_password(target) {
            var input = document.getElementById('password');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }

        function show_password_confirmation(target) {
            var input = document.getElementById('password-confirm');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
    </script>
    <style>
        .password_show {
            position: absolute;
            z-index: 2;
            margin-top: -30px;
            margin-left: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url({{ asset('assets/guest-layout/img/view.svg') }}) 0 0 no-repeat;
        }

        .password_show.view {
            background: url({{ asset('assets/guest-layout/img/no-view.svg') }}) 0 0 no-repeat;
        }
    </style>
@endsection
