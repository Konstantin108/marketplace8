<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Marketplace</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('assets/guest-layout/src/img/favicon.ico')}}" type="image/x-icon"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/guest-layout/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/guest-layout/node_modules/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/guest-layout/node_modules/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/guest-layout/node_modules/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/guest-layout/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/guest-layout/dist/css/theme.min.css')}}">
    <script src="{{asset('assets/guest-layout/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/9200c20d6f.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url({{asset('assets/guest-layout/src/img/thema1.webp')}})">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                @yield('content')

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{asset('assets/guest-layout/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
<script src="{{asset('assets/guest-layout//node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/guest-layout//node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/guest-layout//node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/guest-layout//node_modules/screenfull/dist/screenfull.js')}}"></script>
<script src="{{asset('assets/guest-layout//dist/js/theme.js')}}"></script>
</body>
</html>
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
        left: 10px;
        top: 8px;
        display: inline-block;
        width: 20px;
        height: 20px;
        background: url({{ asset('assets/guest-layout/img/view.svg') }}) 0 0 no-repeat;
    }

    .password_show.view {
        background: url({{ asset('assets/guest-layout/img/no-view.svg') }}) 0 0 no-repeat;
    }
</style>
