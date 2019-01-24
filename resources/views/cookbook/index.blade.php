@extends('master')


{{--<nav>--}}
    {{--<ul>--}}
        {{--<li><a href='index.html'>Home</a></li>--}}
        {{--<li><a href='projects.html'>Fridge</a></li>--}}
        {{--<li><a href='article.html'>POSSIBLE RECIPES</a></li>--}}
        {{--<li><a href='contact.html'>Contact</a></li>--}}
    {{--</ul>--}}
{{--</nav>--}}
<section class="background-img">



<div class="linkto">

        <h2>Cookbook</h2>

    <a class="recipe-a" href="{{ route('kitchen.index') }}" class="possible-only">HOME</a>
    <p class="divider">|</p>
    <a class="recipe-b" href="{{ route('fridge.index') }}" class="possible-only">FRIDGE</a>
    <p class="divider">|</p>
    <a class="recipe-b" href="{{ route('cookbook.filter') }}" class="possible-only">RECIPES I HAVE GORCERIES FOR</a>
</div>


<div class="boxx">



    @foreach ($recipes as $key => $recipe)
        {{--<div>--}}
        {{--<a href="{{ route('cookbook.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>--}}
        {{--</div>--}}



        <article class="card">
            <div class="card__wrapper">

                <figure class="card__feature">
                    <a href='article.html'><img src="images/pic1.png" class="card__img" alt="" width="275" height="240"></a>
                </figure>

                <div class="card__box">

                    <header class="card__item card__header">
                        <h6 class="card__item card__item--small card__label">RECIPE {{$recipe->id}}</h6>
                        <a class="title-recipe" href="{{ route('cookbook.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                        {{--<h2 class="card__item card__item--small card__title">{{ $recipe->name }}</h2>--}}
                        {{--<p>{{ $preparation[$key] }}</p>--}}
                        {{--@foreach ($preparation[$key] as $idx => $value)--}}
                            {{--<p> {{ str_limit($value, 20) }}</p>--}}
                        {{--@endforeach--}}
                    </header>


                    {{--<strong>{{ $idx }}:</strong>--}}
                    <hr class="card__item card__divider">

                    <section class="card__item card__body">

                    </section>

                </div>

            </div>
        </article>



    @endforeach

</div>

</section>