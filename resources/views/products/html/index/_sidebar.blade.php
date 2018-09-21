@if (collect(request()->query())->intersectByKeys($mappings)->all())
    <a href="{{ route('products.index') }}">
        Clear all filters
    </a>
@endif

@foreach ($mappings as $filter => $map)
    <ul class="list-group">
        <li class="list-group-item " style="background: lightgrey">
            {{ $filter }}
            @if (request()->has($filter))
                <a href="{{ route('products.index', removeQueryString($filter)) }}">
                   &times; Clear this filter
                </a>
            @endif
        </li>
        @foreach ($map as $name => $slug)
            <li class="list-group-item">
                <a href="{{ route('products.index', getQueryString([$filter => $slug])) }}">
                    {{ $name }}
                </a>
            </li>
        @endforeach
    </ul>
@endforeach

