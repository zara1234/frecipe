@extends('master')

@section('body-class', 'fridge-index')

@section('body')

    <div class="container container--fridge">
    @if(count($items) > 0)

            <div class="container--head">
                <h2 class="container--head-title">Your Fridge</h2>
                <p class="container--head-subtitle">Manage your fridge-items here.</p>
                {{--<a href="{{ route('cookbook.filter') }}" class="possible-only">Recipes I have Groceries for</a>--}}
            </div>

            <div class="add-items">
                <a class="button" href="{{ route('fridge.addItem') }}">Add Items</a>
            </div>
            <div class="cnt">
                @foreach($items as $item)
                    <div class="cnt--item">
                        <h3>{{ $item->name }}</h3>
                        <form action="{{route("fridge.postChangeItem")}}" class="form-inline form1" id="form1"
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
    @else
        <div>No Groceries in your FRIDGE - Let´s go shopping!</div>
    @endif
    </div>

    

@endsection