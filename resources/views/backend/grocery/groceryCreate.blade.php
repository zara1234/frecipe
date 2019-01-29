@extends('master')

@section('body')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
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
            <form method="post" action="{{ route('cp.groceryCreate') }}" class="left-form">

                <div class="form-group">
                    @csrf
                    <label for="name">Grocery Name</label>
                    <input type="text" class="input" name="share_name"/>
                </div>
                <div class="form-group">
                    <label for="price">Unit</label>
                    <input class="input" type="text" id="search" placeholder="Unit">
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <script src="/js/imagePreview.js"></script>
@endsection