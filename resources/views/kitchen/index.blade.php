@extends('master')
@section("body")

{{--<header>--}}
    {{--<img class="img-logo" src="{{ asset('img/logo-black.png') }}" alt="">--}}
{{--</header>--}}


<div class="cart">

    <h1 id="title">Hi {{ $name }}, welcome to your <strong class="strong">kitchen</strong>!</h1>

    <div class="fridge-button">

        <a href="{{ route('fridge.index') }}" class="button-a">Open Fridge</a>
        <a href="{{ route('cookbook.filter') }}" class="button-a">My Recipes</a>

    </div>

</div>






@endsection





