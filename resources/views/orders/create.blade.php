@extends('layouts.app')

@section('title', 'My order')
   
@section('content')
    <div class="container">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Delivery address</div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="example@domain.com">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="first_name">First name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">Last name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Order summary
                            </div>

                            <div class="card-body">
                                <p class="flex justify-between">
                                    <span>Subtotal: </span>
                                    <span>{{ presentPrice(Cart::subtotal()) }} </span>
                                </p>
                                <p class="flex justify-between">
                                    <span>Shipping & handling: </span>
                                    <span>00 </span>
                                </p>
                                <p class="flex justify-between">
                                    <span>Sales tax: </span>
                                    <span>{{ presentPrice(Cart::tax()) }} </span>
                                </p>
                                <hr>
                                <p class="flex justify-between">
                                    <span>Grand total: </span>
                                    <span>{{ presentPrice(Cart::total()) }} </span>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-danger" href="{{ route('carts.destroy') }}">Cancel order</a>
                                <button type="submit" class="btn btn-primary pull-right">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
    </div>
@endsection