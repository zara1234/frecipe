@extends("master")
@section("body")
{{--<form>--}}
    {{--<div class="form-group">--}}
        {{--<label for="exampleFormControlInput1">Name</label>--}}
        {{--<input type="text" class="form-control" id="exampleFormControlInput1" placeholder=mimi>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label for="exampleFormControlTextarea1">Example textarea</label>--}}
        {{--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
    {{--</div>--}}
{{--</form>--}}

<div class="list-group">
    <a href="{{route('cp.cookbookAdmin')}}" class="list-group-item list-group-item-action active">
        Cookbook
    </a>
    <a href="#" class="list-group-item list-group-item-action active">
        Ingredients
    </a>
    <a href="#" class="list-group-item list-group-item-action active">
        User
    </a>

    @endsection