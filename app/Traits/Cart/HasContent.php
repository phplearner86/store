<?php  

namespace App\Traits\Cart;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

trait HasContent
{

    protected function createCartContent($product, $qty, $cart)
    {
        //Create cart item from product
        $item = $this->createCartItem($product, $qty);

        //Get cart content
        $content = $this->getCartContent($cart);

        //Add to cart
        $this->addToCart($product, $content);

        //Update cart content
        $this->updateCart($cart, $content);
    }

    protected function emptyCart($cart)
    {
        Session::forget($cart);
    }

    protected function updateItemQuantity($rowId, $qty, $cart)
    {
        $content = $this->getCartContent($cart);

        $item = $content->get($rowId);

        $this->createCartItem($item, $qty);

        if ($qty<=0) 
        {
            $this->removeFromCartContent($rowId, $cart);
        }
    }

    protected function removeFromCartContent($rowId, $cart)
    {
       $content = $this->getCartContent($cart);

       $content->pull($rowId);

       $this->updateCart($cart, $content);
    }

    protected function getCartContent($cart)
    {
        $content = Session::has($cart) ? Session::get($cart) : new Collection;

        return $content;
    }

    private function createCartItem($product, $qty)
    {
        $product->qty = $qty;

        $product->subtotal = formatNumber($product->price * $product->qty);

        return $product;
    }

    private function addToCart($product, $content)
    {
        $rowId = $this->generateRowId($product->id);

        $content->put($rowId, $product);
    }

    private function updateCart($cart, $content)
    {
        Session::put($cart, $content);
    }

    private function generateRowId($id)
    {
        $rowId = md5($id);

        return $rowId;
    }
}