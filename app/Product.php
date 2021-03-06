<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
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

    public function scopeFilter($query, $filters)
    {
        // $filters = App\Filters\Filters.php@protected $filters=[]
        return $filters->apply($query); // App\Filters\Filters.php@apply()
    }
}
