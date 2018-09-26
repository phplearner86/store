<?php  

namespace App\Services\Utilities\ShoppingCart;

use App\Product;
use App\Services\Utilities\ShoppingCart\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

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

        //Get the cart content
        $content =  Session::has('default') ? Session::get('default') : new Collection;

        //Add the item to the cart
        $content->put($item->rowId, $item);

        //Update the cart content
        Session::put('default', $content);

        // return $content;
    }

    public function getItems()
    {
         $content =  Session::has('default') ? Session::get('default') : new Collection;

         return $content;
    }

    public function getProducts()
    {
        $content =  Session::has('default') ? Session::get('default') : new Collection;

        $ids = $content->pluck('id')->toArray();

        $products = Product::findMany($ids);

        return $products;
    }
}