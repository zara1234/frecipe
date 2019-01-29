@extends('master')

{{--<nav>--}}
    {{--<ul>--}}
        {{--<li><a href='index.html'>Home</a></li>--}}
        {{--<li><a href='projects.html'>Fridge</a></li>--}}
        {{--<li><a href='article.html'>POSSIBLE RECIPES</a></li>--}}
        {{--<li><a href='contact.html'>Contact</a></li>--}}
    {{--</ul>--}}
{{--</nav>--}}
@section("body")
<section class="background-img">


<div class="boxx">



    @foreach ($recipes as $key => $recipe)
        @component('partials.recipeListItem', ['recipe' => $recipe])
        @endcomponent
    @endforeach

</div>

</section>
    @endsection