@extends('master')

@section('body')



    {{--<div class="list-group">--}}
        {{--<a href="{{ route('cp.recipeCreate') }}" class="possible-only"><span class="glyphicon glyphicon-envelope"></span>Back to Overview</a>--}}
        {{--<h1 class="">Cookbook List</h1>--}}
        {{--<a href="{{route("cp.cookbookCreate")}}" class="recipe-create"> Create a new Recipe</a>--}}
    {{--</div>--}}


    @foreach ($users as $key => $user)
        <div class="cookbook-show">
            <ul class="list-group">
            <li class=" list-group-item-light recipe-name"><strong>USER-ID: </strong> {{$user->id}}</li>
            <li class=" list-group-item-light recipe-name"><strong>USER NAME: </strong>{{$user->name}}</li>
            <li class=" list-group-item-light recipe-name"><strong>E-MAIL: </strong>{{$user->email}}</li>
            <li class=" list-group-item-light recipe-name"><strong>USER-GROUP: </strong>{{$user->user_group}}</li>
            </ul>

            <div class="btn-group">
                <form method="post" action={{ route('cp.user.delete', $user->id) }}>
                    {{method_field('delete') }}
                    @csrf
                    <button class="recipe-btnn" type="submit">Delete</button>
                </form>

                <a href="{{route("cp.userEdit", ['id' => $user->id])}}" class="recipe-btn-edit"> Edit</a>

            </div>

        </div>
    @endforeach


@endsection