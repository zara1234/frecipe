@extends('master')

@section('body')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container-cookbook">
    <div class="card uper">
        <div class="card-header">
           Edit Recipe
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('cp.cookbookEditPost', ['id' => $recipe->id]) }}">

                <div class="form-group">
                    @csrf
                    <label for="name">Title</label>
                    <input type="text" class="input" name="name" value="{{ $recipe->name }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Preparation:</label>
                    <textarea type="text" class="form-control" name="preparation">{{ $recipe->preparationString }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>


    <div class="container">
        <div class="cnt">
            @foreach($recipe->ingredients as $item)
                <div class="cnt--item">
                    <h3>{{ $item->name }}</h3>
                     <form action="{{route("cp.cookbook.postChangeItem", ['id' => $recipe->id])}}" class="form-inline form1" id="form1"
                           method="post">
                    @csrf
                    <label for="amount"></label>
                    <input type="number" id="amount" name="amount" class="input" value="{{ $item->amount }}">
                    <div class="item">{{ $item->unit }}</div>
                    <input type="hidden" value="{{$item->id}}" name="item_id">

                    <div class="submit">
                        <button type="submit" class="btn btn-primary button" value="Ändern">Change</button>
                    </div>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="add-items">
            <a class="button" href="{{ route('cp.cookbook.addItem', ['id' => $recipe->id]) }}">Add Items</a>
        </div>
    </div>

    </div>

@endsection