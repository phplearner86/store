@foreach ($mappings as $filter => $map)
    <ul class="list-group">
        <li class="list-group-item uppercase" style="background: lightgrey">
            {{ $filter }}
        </li>
        @foreach ($map as $name => $slug)
            <li class="list-group-item">
                <a href="{{ route('products.index', [$filter => $slug]) }}">
                    {{ $name }}
                </a>
            </li>
        @endforeach
    </ul>
@endforeach

