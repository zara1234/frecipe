@extends('master')

@section('body-class', 'body-login')

@section('body')

<div class="background-img">
    <div class="content">
        <div class="title">
            <img class="img-logo" src="{{ asset('img/logo-black.png') }}" alt=""></a>
        </div>

        <div class="login-register">
            <form class="login" action="{{ route('login.handle') }}" method="POST">
                {{ @csrf_field() }}
                <h1><strong>LOGIN</strong> TO YOUR <strong>KITCHEN</strong></h1>
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

                <div class="sub-main">
                    <a href="{{ route("register") }}" class="button-two"><span>REGISTER</span></a>
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
</div>
@endsection