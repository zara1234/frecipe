@extends('master')

@section('body')


        {{--<div class="cookbook-img">--}}

                {{--<img src="/storage/recipe_images/{{ $recipe->image }}">--}}
                {{--<img class="img-logo" src="{{ asset('img/logo-black.png') }}" alt="">--}}
                {{--<img src="/storage/recipe_images/{{ $recipe->image }}">--}}

        {{--</div>--}}
        <a href="{{ url()->previous() }}" class="back">Back To Cookbook</a>

        <div class="recipe-show">
        <h1>{{ $recipe->name }}</h1>


        <h2>Ingredients</h2>
        <ul>
                @foreach ($recipe->ingredients as $ingredient)
                        @if ($ingredient->amount === true)
                                <li>a bit of {{ $ingredient->name }}</li>
                        @else
                                <li><strong>{{ $ingredient->amount }} {{ $ingredient->unit }}</strong> {{ $ingredient->name }}</li>
                        @endif
                @endforeach
        </ul>



        <h2>How To</h2>
        <ol>
                @foreach($recipe->preparation as $preparation)
                        <li>{{ $preparation }}</li>
                @endforeach
        </ol>


        </div>
@endsection