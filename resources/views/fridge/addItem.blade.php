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
<body>
<div class="container">


    <div class="container--head add">
        {{--<button type="button" class="btn btn-info">--}}
            {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
        {{--</button>--}}

        <h2 class="container--head-title">All Groceries</h2>
        <p class="container--head-subtitle">Select the groceries you want</p>
        <div class="search">
            <h4>Search</h4>
            <input class="input" type="text" id="search" placeholder="Start typing...">
        </div>
    </div>
    <div class="cnt">
    @foreach($groceries as $item)
        <div class="cnt--item add" data-reference="{{ $item->name }}">
            <h3 class="item">{{ $item->name }}</h3>
            {{--<div class="add-btn">--}}
                {{--<button id="button" class="button1 button">+</button>--}}
            {{--</div>--}}
            <form action="{{route("fridge.postAddItem")}}" class="form-inline form1" id="form1" method="post">
                @csrf
                <label for="amount"></label>
                <input type="number" id="amount" name="amount" class="input">
                <div class="item">{{ $item->unit }}</div>
                <input type="hidden" value="{{$item->id}}" name="item_id">

                <div class="submit">
                    <button type="submit" class="btn btn-primary button" value="Add">Add</button>
                </div>
            </form>
        </div>
    @endforeach
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="/js/SearchLetter.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>


</body>