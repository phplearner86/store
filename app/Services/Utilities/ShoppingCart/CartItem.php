<?php  

namespace App\Services\Utilities\ShoppingCart;

use App\Services\Utilities\ShoppingCart\CartItemOptions;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class CartItem implements Arrayable, Jsonable
{
    /**
     * The cart ittem rowId.
     * 
     * @var string
     */
    public $rowId;

    /**
     * The cart ittem Id.
     * 
     * @var integer
     */
    public $id;

    /**
     * The cart ittem quantity.
     * 
     * @var integer
     */
    public $qty;

    /**
     * The cart ittem name.
     * 
     * @var string
     */
    public $name;

    /**
     * The cart ittem price.
     * 
     * @var float
     */
    public $price;

    /**
     * The cart ittem options.
     * 
     * @var array
     */
    public $options = [];

    /**
     * Instantiate a new model instance.
     * 
     * @param integer $id     
     * @param string $name    
     * @param float $price   
     * @param array $options 
     */
    public function __construct($id, $name, $price, $options)
    {
        $this->rowId = $this->generateRowId($id);
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->options = new CartItemOptions($options);
    }

    /**
     * Set the cart item quantity.
     * 
     * @param integer $qty 
     * @return void
     */
    public function setQuantity($qty)
    {
        $this->qty = $qty;
    }

    /**
     * Get the cart item attributes.
     * 
     * @param  string $attribute 
     * @return mixed          
     */
    public function __get($attribute)
    {
        if (property_exists($this, $attribute)) 
        {
           return $this->{$attribute};
        }

        if ($attribute == 'subtotal') 
        {
            return $this->qty * $this->price;
        }

        return null;
    }

    /**
     * Create a new instance of the card item from the attributes.
     * 
     * @param  int $id      
     * @param  str $name    
     * @param  float $price   
     * @param  array $options 
     * @return App\Services\Utilities\ShoppingCart          
     */
    public static function fromAttributes($id, $name, $price, $options)
    {
        return new self($id, $name, $price, $options);
    }

    /**
     * Convert an instance to an array.
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'rowId'     =>  $this->rowId,
            'id'     =>  $this->id,
            'name'     =>  $this->name,
            'qty'     =>  $this->qty,
            'price'     =>  $this->price,
            'options'     =>  $this->options,
            'subtotal'     =>  $this->subtotal,
        ];
    }

    /**
     * Convert the object to its JSON representation.
     * 
     * @param  integer $options 
     * @return string           
     */
    public function toJson($options=0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Generate a unique cart item id.
     * 
     * @param  int $id
     * @return string   
     */
    private function generateRowId($id)
    {
        return md5($id);
    }
}