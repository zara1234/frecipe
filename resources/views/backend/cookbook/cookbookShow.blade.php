@extends("master")
@section("body")


<div class="list-group">
    <a href="{{ route('cp.recipeCreate') }}" class="possible-only">Back to Overview</a>
    <h1 class="display-4">Cookbook</h1>
</div>

<a href="{{route("cp.cookbookCreate")}}"> Create</a>
@foreach ($recipes as $key => $recipe)
    <div class="cookbook-show">
<li class="list-group-item list-group-item-light">{{$recipe->name}}</li>
        <div class="btn-group">
            <form method="post" action={{ route('cp.cookbook.delete', $recipe->id) }}>
                {{method_field('delete') }}
                @csrf
                <button class="btn btn-light" type="submit">Delete</button>
            </form>

            <a href="{{route("cp.cookbookCreate")}}"> Edit</a>

        </div>

    </div>
@endforeach




@endsection
