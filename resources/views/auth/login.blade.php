<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Frecipe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Frecipe
        </div>

        <div class="login-register">
            <form class="login" action="{{ route('login.handle') }}" method="POST">
                {{ @csrf_field() }}
                <h1>LOGIN</h1>
                <p>E-MAIL ADRESS</p>
                <input id="email" type="text" name="email" class="form__input" placeholder="e-mail adress" required>
                <p>PASSWORD</p>
                <input id="password" type="password" name="password" class="form__input" placeholder="password" required>

                <div class="sub-main">
                    <button class="button-two"><span>LOGIN</span></button>
                </div>


            </form>

            <div class="register1">
                <h1>NOT A MEMBER?</h1>
                <p>Once installed, the laravel new command will create a fresh Laravel installation in the directory you specify.
                    For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all
                    of Laravel's dependencies already installed:</p>

                <div class="form__field">
                    <input type="submit" value="Register">
                </div>
            </div>

        </div>


        {{--<div class="links">--}}
        {{--<a href="https://laravel.com/docs">Documentation</a>--}}
        {{--<a href="https://laracasts.com">Laracasts</a>--}}
        {{--<a href="https://laravel-news.com">News</a>--}}
        {{--<a href="https://nova.laravel.com">Nova</a>--}}
        {{--<a href="https://forge.laravel.com">Forge</a>--}}
        {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--</div>--}}
    </div>
</div>
</body>
</html>
