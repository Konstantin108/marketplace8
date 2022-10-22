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

    <div class="center" style="padding-left: 36%">
        <form method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style=" width: 700px; position: relative">
                <label for="avatar">
                    <h4>Аватар</h4>
                </label>
                <div style="display:flex;
                            justify-content: flex-start;
                            margin-bottom: 20px;">
                    @if($user->avatar)
                        <img src="{{ \Storage::disk('public')->url( $user->avatar) }}" class="avatar-img"
                             alt="avatar"
                             style="width: 200px;">
                        <input type="button"
                               id="clearImg"
                               class="delete_icon_img"
                               style="position: absolute; left: 204px; top: 134px; cursor: pointer"
                        >
                        <input type="hidden" value="" id="no_photo" name="no_photo">
                        <script>
                            let controlImg = document.querySelector(".avatar-img"),
                                noPhoto = document.querySelector("#no_photo"),
                                clearBnImg = document.querySelector("#clearImg");
                            clearBnImg.addEventListener("click", function () {
                                noPhoto.value = 'no_photo';
                                controlImg.src = '/img/no_photo.jpg';
                                control.value = '';
                                let newControlImg = controlImg.cloneNode(true)
                                controlImg.replaceWith(newControl);
                                controlImg = newControlImg;
                            });
                        </script>
                    @else
                        <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                    @endif
                </div>

                <input type="file" id="avatar" name="avatar" class="form-control" style="width: 500px;">
                <input type="button"
                       id="clear"
                       class="delete_icon"
                       style="position: absolute; left: 218px; top: 262px; cursor: pointer"
                >
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
                <div style=" width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                    <div style="display: flex; justify-content: space-between;">
                    <label for="name">
                        <h4>
                            Имя
                        </h4>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           style="@error('name')border: red 1px solid;@enderror padding-left: 6px;padding-right: 16px; margin-bottom: 8px; width: 208px; position: relative"
                           class="form-control"
                           value="{{$user->name}}">
                    </div>
                    <div>
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <div>
                                    <p style="font-size: 14px; color: red; line-height: 1">
                                        {{$error}}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div
                    style="width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                    <div style="display: flex; justify-content: space-between;">
                        <label for="surname">
                            <h4>
                                Фамилия
                            </h4>
                        </label>
                        <input type="text"
                               id="surname"
                               name="surname"
                               style="@error('surname')border: red 1px solid;@enderror padding-left: 6px;padding-right: 16px; margin-bottom: 8px; width: 208px;"
                               class="form-control"
                               value="{{$user->surname}}">
                    </div>
                    <div>
                        @if($errors->has('surname'))
                            @foreach($errors->get('surname') as $error)
                                <div>
                                    <p style="font-size: 14px; color: red">
                                        {{$error}}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group"
                     style="position: relative; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                    <div style="display: flex; justify-content: space-between;">
                        <label for="old_password">
                            <h4>
                                Старый пароль
                            </h4>
                        </label>
                        <input type="text"
                               class="form-control
                                      password_hide
                                      @error('new_password_confirmation') form-control-danger @enderror
                                   hidden_text"
                               id="old_password"
                               style="padding-left: 6px;padding-right: 29px; margin-bottom: 8px;"
                               onpaste="return false;"
                               oncopy="return false;"
                               name="old_password"
                               autocomplete="off">
                        <a href="#" class="password_show" tabindex="-1"
                           onclick="return show_old_password(this);"></a>
                    </div>
                    <div>
                        @if(session()->has('errorOldPass'))
                            <div style="width: 260px;">
                                <p style="font-size: 14px; color: red">
                                    {{session()->get('errorOldPass')}}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group"
                     style="position: relative; display: flex; justify-content: space-between; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                    <label for="new_password">
                        <h4>
                            Новый пароль
                        </h4>
                    </label>
                    <input type="text"
                           class="form-controlpassword_hide hidden_text"
                           id="new_password"
                           onpaste="return false;"
                           style="padding-left: 6px;padding-right: 29px; margin-bottom: 8px;"
                           oncopy="return false;"
                           name="new_password"
                           autocomplete="off">
                    <a href="#" class="password_show" tabindex="-1"
                       onclick="return show_new_password(this);"></a>
                    <div style="position: absolute; left: 400px;">
                    </div>
                </div>
                <div class=" form-group"
                     style="position: relative; width: 400px; border-bottom: 2px solid grey; margin-bottom: 2px;">
                    <div style=" display: flex; justify-content: space-between;">
                        <label for="new_password_confirmation">
                            <h4>
                                Подтвердите пароль
                            </h4>
                        </label>
                        <input type="text"
                               class="form-control
                                   password_hide
                                   hidden_text
                                   @error('new_password_confirmation') form-control-danger @enderror"
                               id="new_password_confirmation"
                               onpaste="return false;"
                               style="padding-left: 6px;padding-right: 29px; margin-bottom: 8px;"
                               oncopy="return false;"
                               name="new_password_confirmation"
                               autocomplete="off">
                        <a href="#" class="password_show" tabindex="-1"
                           onclick="return show_new_password_confirmation(this);"></a>
                    </div>
                    <div>
                        @if($errors->has('new_password'))
                            @foreach($errors->get('new_password') as $error)
                                <div style="width: 260px;">
                                    <p style="font-size: 14px; color: red">
                                        {{ $error }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                        @if(session()->has('errorNewPass'))
                            <div style="width: 260px;">
                                <p style="font-size: 14px; color: red">
                                    {{session()->get('errorNewPass')}}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit"
                            class="button"
                            style="padding-bottom: 40px;
                                text-align: center;
                                outline: none;
                                border: none;
                                cursor: pointer;
                                vertical-align: center"
                            name="updateProfile"
                            id="updateProfile">
                        Сохранить
                    </button>
                    <a class="button"
                       style="padding-bottom: 16px;
                        padding-top: 16px;
                                text-align: center;
                                outline: none;
                                border: none;
                                cursor: pointer;
                                vertical-align: center"
                       href="{{ route('myProfile') }}">Назад</a>
                </div>
            </div>
        </form>
    </div>
    <style>
        .password_show {
            position: absolute;
            top: 6px;
            outline: none;
            right: 6px;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url({{ asset('assets/guest-layout/img/view.svg') }}) 0 0 no-repeat;
        }

        .password_show.view {
            background: url({{ asset('assets/guest-layout/img/no-view.svg') }}) 0 0 no-repeat;
        }

        .delete_icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-style: none;
            background: url({{ asset('assets/guest-layout/img/delete_icon.svg') }}) 0 0 no-repeat;
        }

        .delete_icon_img {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-style: none;
            background: url({{ asset('assets/guest-layout/img/delete_icon.svg') }}) 0 0 no-repeat;
        }

        .hidden_text {
            text-security: disc;
            -webkit-text-security: disc;
        }
    </style>
    <script>
        function show_old_password(target) {
            var input = document.getElementById('old_password');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }

        function show_new_password(target) {
            var input = document.getElementById('new_password');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }

        function show_new_password_confirmation(target) {
            var input = document.getElementById('new_password_confirmation');
            if (!target.classList.contains('view')) {
                target.classList.add('view');
                input.classList.remove('hidden_text');
            } else {
                target.classList.remove('view');
                input.classList.add('hidden_text');
            }
            return false;
        }
    </script>

@endsection
