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
            {{--<div>--}}
            {{--<a href="{{ route('cookbook.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>--}}
            {{--</div>--}}



            <article class="card">
                <div class="card__wrapper">

                    <figure class="card__feature">
                        <a href='{{ route('cookbook.show', ["id" => $recipe->id]) }}'><img src="images/pic1.png" class="card__img" alt="" width="275" height="240"></a>
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
    @endsection