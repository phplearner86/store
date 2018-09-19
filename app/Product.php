<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Set product price attribute
     * 
     * @param  integer $value 
     * @return float
     */
    public function getPriceAttribute($value)
    {
        $price = $value/100;

        return format_price($price);
    }

    /**
     * Set Product price and currency
     * 
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        return config('app.currency') . $this->price;
    }
}
