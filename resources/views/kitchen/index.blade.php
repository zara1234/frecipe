<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Frecipe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body >

<header>
<img class="img-logo" src="{{ asset('img/logo-black.png') }}" alt=""></a>
</header>


<div class="cart">

    <h1>Hi {{ $name }}, welcome to your <strong class="strong">kitchen</strong>!</h1>

    <div>

    <a href="{{ route('fridge.index') }}">Open Fridge</a>
    <a href="{{ route('cookbook.index') }}">All Recipes</a>

    </div>

</div>

</body>