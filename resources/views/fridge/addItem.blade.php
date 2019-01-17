All Groceries


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
<p>Select the groceries you want</p>
    @foreach($groceries as $item)
        <div class="test">
        <div class="item">{{ $item->name }}</div>
        <button id="button" class="button1">+</button>
        <form action="{{route("fridge.postAddItem")}}" class="form-inline form1"  id="form1" method="post">
            @csrf
            <label for="amount"></label>
            <input type="number" id="amount" name="amount">
            <div class="item">{{ $item->unit }}</div>
            <input type="hidden" value="{{$item->id}}" name="item_id">

            <input type="submit" class="btn btn-primary" value="Hinzufügen">
        </form>

        </div>

    @endforeach

<script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>