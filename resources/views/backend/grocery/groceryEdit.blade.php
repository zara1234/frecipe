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
                Edit Grocery
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
                <form method="post" action="{{ route('cp.cookbookEditPost', ['id' => $groceries->id]) }}" class="left-form" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label for="name">Title</label>
                        <input type="text" class="input" name="name" value="{{ $groceries->name }}"/>
                    </div>

                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="input" name="unit" value="{{ $groceries->unit }}"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>



        </div>

    </div>
    <script src="/js/imagePreview.js"></script>

@endsection