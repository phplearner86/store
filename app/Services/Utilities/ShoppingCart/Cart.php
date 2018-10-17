<?php  

namespace App\Services\Utilities\ShoppingCart;

use App\Traits\Cart\HasContent;


class Cart 
{
    use HasContent;

    public function addItem($product, $qty=1, $cart='default')
    {
        $this->createCartContent($product, $qty, $cart);
    }

    public function getItems($cart='default')
    {
        $items = $this->getCartContent($cart);

        return $items;
    }

    public function removeItem($rowId, $cart='default')
    {
       $this->removeFromCartContent($rowId, $cart);
    }

    public function updateItem($rowId, $qty, $cart='default')
    {
        $this->updateItemQuantity($rowId, $qty, $cart);
    }

    public function empty($cart='default')
    {
        $this->emptyCart($cart);
    }

    public function subtotal($cart='default')
    {
       $subtotal = $this->calculateCartSubtotal($cart);

       return $subtotal;
    }

    public function tax($cart='default')
    {
        return $this->calculateCartTax($cart);
    }

    public function total($cart='default')
    {
        return $this->calculateCartTotal($cart);
    }

    protected function calculateCartTotal($cart)
    {
        $content = $this->getCartContent($cart);

        $taxAmount = $this->calculateCartTax($cart);

        $total = $content->reduce(function ($total, $product) use($taxAmount) {

            return $total + $product->subtotal;

        }, $taxAmount);

        return $total;
    }

    protected function calculateCartSubtotal($cart)
    {
        $content = $this->getCartContent($cart);

        $subtotal = $content->reduce(function($subtotal, $item){
            return $subtotal + $item->price * $item->qty;
        });

        return (float)formatNumber($subtotal);
    }

    protected function calculateCartTax($cart)
    {
        $taxRate = config('cart.tax');

        $subtotal = $this->calculateCartSubtotal($cart);

        $tax = $subtotal * $taxRate/100;

        return formatNumber($tax);
    }

}