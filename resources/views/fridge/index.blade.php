@extends('master-with-nav')

@section('body-class', 'fridge-index')

@section('body')
@if(count($items) > 0)
    @foreach($items as $item)
        <div class="item">{{ $item->name }}
            <form action="{{route("fridge.postChangeItem")}}" class="form-inline form1"  id="form1" method="post">
                @csrf
                <label for="amount"></label>
                <input type="number" id="amount" name="amount" value="{{ $item->amount }}">
                <div class="item">{{ $item->unit }}</div>
                <input type="hidden" value="{{$item->id}}" name="item_id">

                <input type="submit" class="btn btn-primary" value="Ändern">
            </form>
        </div>
    @endforeach
@else
    <div>Keine Items im Kühlschrank</div>
    @endif

<div>

    <a href="{{ route('fridge.addItem') }}">Add Items</a>

</div>

    @endsection