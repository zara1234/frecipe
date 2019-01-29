@extends('master')
@section("body")

<header>
    <img class="img-logo" src="{{ asset('img/logo-black.png') }}" alt=""></a>
</header>


<div class="cart">

    <h1>Hi {{ $name }}, welcome to your <strong class="strong">kitchen</strong>!</h1>

    <div class="fridge-button">

        <a href="{{ route('fridge.index') }}">Open Fridge</a>
        <a href="{{ route('cookbook.index') }}">All Recipes</a>

    </div>

</div>

@endsection