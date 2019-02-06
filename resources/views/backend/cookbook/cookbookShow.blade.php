@extends("master")
@section("body")




<div class="list-group">
    <a href="{{ route('cp.recipeCreate') }}" class="possible-only"><span class="glyphicon glyphicon-envelope"></span>Back to Overview</a>
    <h1 class="">Cookbook List</h1>
    <a href="{{route("cp.cookbookCreate")}}" class="recipe-create"> Create a new Recipe</a>
</div>


@foreach ($recipes as $key => $recipe)
    <div class="cookbook-show">
<li class=" list-group-item-light recipe-name">{{$recipe->name}}</li>
        <div class="btn-group">
            <form method="post" action={{ route('cp.cookbook.delete', $recipe->id) }}>
                {{method_field('delete') }}
                @csrf
                <button class="recipe-btnn" type="submit">Delete</button>
            </form>

            <a href="{{route("cp.cookbookEdit", ['id' => $recipe->id])}}"class="recipe-btn-edit"> Edit</a>

        </div>

    </div>
@endforeach


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
