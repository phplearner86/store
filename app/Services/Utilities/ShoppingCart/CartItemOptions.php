<?php  

namespace App\Services\Utilities\ShoppingCart;

use Illuminate\Support\Collection;

class CartItemOptions extends Collection
{
    /**
     * Get the item attributes by the given key
     * 
     * @param  string $key 
     * @return mixed    
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}