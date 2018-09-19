@extends('layouts.app')

@section('title', 'All products')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Filters --}}
            <div class="col-md-3">
                Filters
            </div>
            
            {{-- Products --}}
            <div class="col-md-9">
                @if ($products->count())
                    <div class="row">

                        {{-- Single Product --}}
                        @foreach ($products as $product)
                                
                            @include('products.html._product')
                                
                        @endforeach
                    </div>
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
