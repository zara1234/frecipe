<div class="flex-center position-ref">
    @if (Route::has('login'))
        <nav class="top-right links">
            @auth
                <a href="{{ route('kitchen.index') }}">Home</a>

                <div class="nav-item">
                    <form action="{{ route('logout') }}" class="logout" method="post">
                        @csrf
                        <button class="logout" type="submit">Logout</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </nav>
@endif
</div>