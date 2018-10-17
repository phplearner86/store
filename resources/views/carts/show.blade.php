@extends('layouts.app')

@section('title', 'My cart')


@section('content')
    <div class="container">
        
        @if ($cartItems->count())
            
        <a href="{{ route('carts.destroy') }}" class="btn btn-danger pull-right mb-4">Empty cart</a>

        <table class="table bg-white">
            <thead class="uppercase bg-grey-lighter">
                <th width="25%">Item</th>
                <th width="20%">Description</th>
                <th width="20%" class="text-center">Price</th>
                <th width="12%">Qty</th>
                <th width="13%" class="text-right">Subtotal</th>
                <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
            </thead>

            <tbody>
                @foreach ($cartItems as $rowId => $item)
                <tr>
                    <td>
                        <a href="{{ route('products.show', $item) }}">
                            {{ $item->name }}
                        </a>
                    </td>

                    <td class="text-xs">
                        {{ $item->description }}
                    </td>

                    <td class="text-center">
                        {{ $item->present_price }}
                    </td>

                    <td>
                        <form action="{{ route('carts.update', $rowId) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="flex">
                                <input type="text" name="qty", id="qty" class="form-control text-center" value="{{ $item->qty }}">
                                <button class="btn" type="submit"><i class="fa fa-refresh"></i></button>
                            </div>
                        </form>
                    </td>

                    <td class="text-right">
                        {{ presentPrice($item->subtotal) }}
                    </td>
                    
                    <td class="text-center"><a href="{{ route('carts.remove', $rowId) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                <tr>
                    <td class="border-0"></td>
                    <td colspan="3" class="text-right">
                        <p class="mb-2">Subtotal: </p>
                        <p class="mb-2">Shipping & Handling: </p>
                        <p class="mb-2">Tax ({{ config('cart.tax') }}%): </p>
                        <p class="font-semibold uppercase mb-0">Grand Total: </p>
                    </td>
                    <td class="text-right">
                        <p class="mb-2">{{ Cart::subtotal() }}</p>
                        <p class="mb-2">$ 0.00</p>
                        <p class="mb-2">{{ Cart::tax() }}</p>
                        <p class="mb-2">{{ Cart::total() }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
                <a class="btn btn-primary pull-right" href="{{ route('orders.create') }}">Check out</a>
        @else
            <h2>Your cart is empty!</h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue shopping</a>
        @endif
    </div>
@endsection