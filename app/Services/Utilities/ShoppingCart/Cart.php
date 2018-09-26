<?php  

namespace App\Services\Utilities\ShoppingCart;

use App\Services\Utilities\ShoppingCart\CartItem;

class Cart
{
    /**
     * Create cart item.
     * 
     * @param  integer $id     
     * @param  string $name   
     * @param  integer $price   
     * @param  integer $qty     
     * @param  array  $options 
     * @return App\Services\Utilities\ShoppingCart\CartItem         
     */
    public function createCartItem($id, $name, $price, $qty, $options=[])
    {
        //Create cart item from product
        $item = CartItem::fromAttributes($id, $name, $price, $options);

        $item->setQuantity($qty);

        return $item;
    }
}