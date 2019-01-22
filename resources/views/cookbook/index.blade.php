
@extends('master')



@foreach ($recipes as $recipe)
    <div>
        <a href="{{ route('cookbook.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
    </div>
@endforeach

<a href="{{ route('cookbook.filter') }}" class="possible-only">Only show recipes i have groceries for</a>


<div class="articles">

    <article class="card">
        <div class="card__wrapper">

            <figure class="card__feature">
                <a href='article.html'><img src="images/pic1.png" class="card__img" alt="" width="275" height="240"></a>
            </figure>

            <div class="card__box">

                <header class="card__item card__header">
                    <h6 class="card__item card__item--small card__label">Recipe</h6>
                    <h2 class="card__item card__item--small card__title">Scrambled Eggs</h2>
                </header>

                <hr class="card__item card__divider">

                <section class="card__item card__body">
                    <p>See the beautiful oceans of the Pacific coast where the water is so clean you can see the sand.</p>
                </section>

            </div>

        </div>
    </article>