@foreach ($recipes as $recipe)
    <div>
        <a href="{{ route('cookbook.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
    </div>
@endforeach

<a href="{{ route('cookbook.filter') }}" class="possible-only">Only show recipes i have groceries for</a>