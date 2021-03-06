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
            <form method="post" action="{{ route('cp.cookbookEditPost', ['id' => $recipe->id]) }}" class="left-form" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="name">Title</label>
                    <input type="text" class="input" name="name" value="{{ $recipe->name }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Preparation:</label>
                    <textarea type="text" class="form-control" name="preparation">{{ $recipe->preparationString }}</textarea>
                </div>
                <div class="upload">
                    <div class="image-preview"><img src="/storage/recipe_images/{{ $recipe->image }}" width="150" alt=""></div>
                    <input type="text" placeholder="Image Title" class="form-control" name="image_title">
                    <input type="file" name="image" id="image">
                    <label class="button" for="image">Upload Recipe Image</label>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>


    <div class="container">
        <div class="header-text">
            <h2 class="title-i">Ingredients</h2>
            <p>Overview of current Ingredients</p>

        </div>

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
    <script src="/js/imagePreview.js"></script>

@endsection