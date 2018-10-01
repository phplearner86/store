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

}