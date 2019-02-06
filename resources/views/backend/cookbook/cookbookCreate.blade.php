@extends('master')

@section('body')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>


    <div class="list-group">
        <a href="{{ route('cp.recipeCreate') }}" class="possible-only"><span class="glyphicon glyphicon-envelope"></span>Back to Overview</a>
        <h1 class="">Create a new Recipe</h1>
    </div>
    <div class="card uper">
        <div class="card-header">
            Add Share
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
            <form method="POST" action="{{ route('cp.cookbookCreateStore') }}" class="left-form cookbook_create" id="cookbookCreateForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="input" name="name"/>
                </div>
                <div class="search">
                    <h6>Search Ingredients</h6>
                    <input class="input" type="text" id="search" placeholder="Start typing...">
                    <input type="hidden" name="ingredients">
                    <div class="search-selected">

                    </div>
                </div>
                <div class="form-group">
                    <label for="quantity">Preparation:</label>
                <textarea type="text" name="preparation" class="form-control" name="preparation"></textarea>
                </div>
                <div class="upload">
                    <div class="image-preview"><img src="" width="150" alt=""></div>
                    <input type="text" placeholder="Image Title" name="image_title">
                    <input type="file" name="image" id="image">
                    <label class="button" for="image">Upload Recipe Image</label>
                </div>
                <button type="submit" class="btn btn-primary" id="cookbookCreateBtn">Add</button>
            </form>
        </div>

    </div>
    <div class="search-results">
        <div class="cnt">
            <h3>Ingredients</h3>
            <div class="cnt--inner">
                @foreach($grocery as $key => $item)
                    <div class="card" data-unit="{{ $item->unit }}" data-id="{{ $item->id }}" data-reference="{{ $item->name }}">
                        <strong>{{ $item->name }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--<div class="container">--}}
        {{--<div class="header-text">--}}
            {{--<h2 class="title-i">Ingredients</h2>--}}
            {{--<p>Overview of current Ingredients</p>--}}

        {{--</div>--}}

        {{--<div class="cnt">--}}

            {{--@foreach($recipe->ingredients as $item)--}}
                {{--<div class="cnt--item">--}}
                    {{--<h3>{{ $item->name }}</h3>--}}
                    {{--<form action="{{ route("cp.cookbookCreateStore")}}" class="form-inline form1" id="form1"--}}
                          {{--method="post">--}}
                        {{--@csrf--}}
                        {{--<label for="amount"></label>--}}
                        {{--<input type="number" id="amount" name="amount" class="input" value="{{ $item->amount }}">--}}
                        {{--<div class="item">{{ $item->unit }}</div>--}}
                        {{--<input type="hidden" value="{{$item->id}}" name="item_id">--}}

                        {{--<div class="submit">--}}
                            {{--<button type="submit" class="btn btn-primary button" value="Ändern">Change</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}

        {{--<div class="add-items">--}}
            {{--<a class="button" href="{{ route('cp.cookbook.addItem', ['id' => $recipe->id]) }}">Add Items</a>--}}
        {{--</div>--}}
    {{--</div>

    </div>--}}
    <script src="/js/Search.js"></script>
    <script src="/js/cookbookCreate.js"></script>
    <script src="/js/imagePreview.js"></script>


@endsection