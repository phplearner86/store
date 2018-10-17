<?php

namespace App;

use App\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function placeNew($data)
    {
        $customer = Customer::createNew($data);

        $order = static::createNew($customer);

        Cart::empty();
        
        return $order;
    }

    protected static function createNew($customer)
    {
        $order = new static();

        $order->number = rand(1,40000);
        $order->subtotal = formatFloat(Cart::subtotal());
        $order->tax = formatFloat(Cart::tax());
        $order->total = formatFloat(Cart::total());

        $order->customer()->associate($customer);

        $order->save();

        return $order;
    }
}
