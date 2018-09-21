<ul class="list-group">
    <li class="list-group-item uppercase" style="background: lightgrey">
        Category
    </li>
    @foreach ($categories as $category)
        <li class="list-group-item">
            <a href="{{ route('products.index', ['category'=> $category->slug]) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>

<ul class="list-group">
    <li class="list-group-item uppercase" style="background: lightgrey">
        Price
    </li>
    <li class="list-group-item">
        <a href="{{ route('products.index', ['price'=> 'high_to_low']) }}">
            High to low
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('products.index', ['price'=> 'low_to_high']) }}">
            Low to high
        </a>
    </li>
</ul>