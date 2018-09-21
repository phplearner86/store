@extends('layouts.app')

@section('title', 'All products')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Filters --}}
            <div class="col-md-3">
                @include('products.html.index._sidebar')
            </div>
            
            {{-- Products --}}
            <div class="col-md-9">
                @if ($products->count())
                        {{-- Single Product --}}
                        @foreach ($products->chunk(3) as $chunk)
                            <div class="row">
                                @each ('products.html.index._product', $chunk, 'product')
                            </div>
                        @endforeach
                @else
                    No Products
                @endif
                
                {{-- Pagination --}}
                <div class="pagination pull-right">
                    {{ $products->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
