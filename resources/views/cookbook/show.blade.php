<h1>{{ $recipe->name }}</h1>

<h2>Ingredients</h2>
<ul>
@foreach ($recipe->ingredients as $ingredient)
    @if ($ingredient->amount === true)
        <li>a bit of {{ $ingredient->name }}</li>
    @else
        <li>{{ $ingredient->amount }} {{ $ingredient->unit }} {{ $ingredient->name }}</li>
    @endif
@endforeach
</ul>

<h2>How To</h2>
<ol>
    @foreach($recipe->preparation as $preparation)
        <li>{{ $preparation }}</li>
    @endforeach
</ol>

<a href="{{ url()->previous() }}" class="back">Back To Cookbook</a>