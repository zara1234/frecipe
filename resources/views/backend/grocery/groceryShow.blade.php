@extends("master")
@section("body")


    <div class="list-group">
        <a href="{{ route('cp.recipeCreate') }}" class="possible-only">Back to Overview</a>
        <h1 class="display-4">Groceries</h1>
    </div>

    <a href="{{route("cp.groceryCreate")}}"> Create</a>
    @foreach ($groceries as $key => $grocery)
        <div class="cookbook-show">
            <li class="list-group-item list-group-item-light">{{$grocery->name}}</li>
            <div class="btn-group">
                <form method="post" action={{ route('cp.cookbook.delete', $grocery->id) }}>
                    {{method_field('delete') }}
                    @csrf
                    <button class="btn btn-light" type="submit">Delete</button>
                </form>

                <a href="{{route("cp.groceryEdit", ['id' => $grocery->id])}}"> Edit</a>

            </div>

        </div>
    @endforeach




@endsection
