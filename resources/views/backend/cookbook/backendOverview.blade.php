@extends("master")
@section("body")


<div class="ctn-backend">



    <div class="header-backend">
        <h1><strong>Backend Overview</strong></h1>
        <p>manage your <strong>Database</strong> here</p>
    </div>

    <div class="backend-overview">
        <a href="{{route('cp.cookbookAdmin')}}" class="btn-backend">
            Cookbook
        </a>
        <a href="{{route('cp.groceryShow')}}" class="btn-backend">
            Ingredients
        </a>
        <a href="{{route('cp.userShow')}}" class="btn-backend">
            User
        </a>
</div>



    @endsection