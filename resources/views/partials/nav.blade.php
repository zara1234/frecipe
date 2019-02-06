{{--<div class="flex-center position-ref">--}}
{{--@if (Route::has('login'))--}}
{{--<nav class="top-right links">--}}
{{--@auth--}}
{{--<a href="{{ route('kitchen.index') }}">Home</a>--}}

{{--<div class="nav-item">--}}
{{--<form action="{{ route('logout') }}" class="logout" method="post">--}}
{{--@csrf--}}
{{--<button class="logout" type="submit">Logout</button>--}}
{{--</form>--}}
{{--</div>--}}
{{--@else--}}
{{--<a href="{{ route('login') }}">Login</a>--}}

{{--@if (Route::has('register'))--}}
{{--<a href="{{ route('register') }}">Register</a>--}}
{{--@endif--}}
{{--@endauth--}}
{{--</nav>--}}
{{--@endif--}}
{{--</div>--}}

<div class="nav">
    <label for="toggle" class="toggle">&#9776</label>
    <input type="checkbox" id="toggle">
    <div class="menu">
        <a class="recipe-b" href="{{ route('kitchen.index') }}" class="possible-only">kitchen</a>
        <a class="recipe-b" href="{{ route('fridge.index') }}" class="possible-only">my fridge</a>
        <a class="recipe-b" href="{{ route('cookbook.index') }}" class="possible-only">all recipes</a>
        @if(Auth::user()->user_group == 1)
            <a class="recipe-b" href="{{ route("cp.recipeCreate") }}" class="possible-only"><strong>BACKEND</strong></a>
            @endif
        <form action="{{ route('logout') }}" class="logout" method="post">
            @csrf
            <button class="btn btn-light logout" type="submit">Logout</button>
        </form>
    </div>
</div>

{{--<nav class="nav">--}}

    {{--<ul class="nav--list">--}}
        {{--<li class="nav--list-item"><a class="recipe-a" href="{{ route('kitchen.index') }}" class="possible-only">KITCHEN</a></li>--}}
        {{--<li class="divider">|</li>--}}
        {{--<li class="nav--list-item"><a class="recipe-b" href="{{ route('fridge.index') }}" class="possible-only">MY FRIDGE</a></li>--}}
        {{--<li class="divider">|</li>--}}
        {{--<li class="nav--list-item"><a class="recipe-b" href="{{ route('cookbook.filter') }}" class="possible-only">AVAILABLE RECIPES </a></li>--}}

        {{--@if(Auth::user()->user_group == 1)--}}
            {{--<li class="divider">|</li>--}}
            {{--<li class="nav--list-item"><a class="recipe-b" href="{{ route("cp.recipeCreate") }}" class="possible-only">BACKEND</a></li>--}}
        {{--@endif--}}
    {{--</ul>--}}

    {{--<ul>--}}
        {{--<li>--}}

        {{--</li>--}}
    {{--</ul>--}}


{{--</nav>--}}