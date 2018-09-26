@extends('layouts.app')

@section('title', 'My cart')


@section('content')
    <div class="container">
        My cart

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
                @foreach ($cartItems as $item)
                <tr>
                    <td>
                        <a href="{{ route('products.show', $products->find($item->id)->slug) }}">
                            {{ $item->name }}
                        </a>
                    </td>

                    <td class="text-xs">
                        {{ $products->find($item->id)->description }}
                    </td>

                    <td class="text-center">
                        {{ $item->price }}
                    </td>

                    <td>
                        {{ $item->qty }}
                    </td>

                    <td class="text-right">
                        {{ $item->subtotal }}
                    </td>
                    
                    <td class="text-center"><a href="#"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection