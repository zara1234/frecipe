
<nav class="nav">

    <h2></h2>
    <ul class="nav--list">
        <li class="nav--list-item"><a class="recipe-a" href="{{ route('cp.cookbookShow') }}" class="possible-only">HOME</a></li>
        <li class="divider">|</li>
        <li class="nav--list-item"><a class="recipe-b" href="{{ route('fridge.index') }}" class="possible-only">FRIDGE</a></li>
        <li class="divider">|</li>
        <li class="nav--list-item"><a class="recipe-b" href="{{ route('cookbook.filter') }}" class="possible-only">RECIPES I HAVE GORCERIES FOR</a></li>
        <li class="divider">|</li>
        @if(Auth::user()->user_group == 1)
            <li class="nav--list-item"><a class="recipe-b" href="{{ route("cp.recipeCreate") }}" class="possible-only">Create</a></li>
        @endif
    </ul>

    <ul>
        <li>
            <form action="{{ route('logout') }}" class="logout" method="post">
                @csrf
                <button class="logout" type="submit">Logout</button>
            </form>
        </li>
    </ul>


</nav>