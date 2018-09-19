@extends('layouts.app')

@section('title', 'All products')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                Filters
            </div>
            <div class="col-md-9">
                @if ($products->count())
                    @foreach ($products->chunk(3) as $chunk)
                        <div class="row">
                            @foreach ($chunk as $product)
                                @include('products.html._product')
                            @endforeach
                        </div>
                    @endforeach
                @else
                    No Products
                @endif

                <div class="pagination pull-right">
                    {{ $products->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
