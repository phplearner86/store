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

    public function getRouteKeyName()
    {
        return 'slug';
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

        return formatNumber($price);
    }

    /**
     * Set Product price and currency
     * 
     * @return string
     */
    public function getPresentPriceAttribute()
    {
        return presentPrice($this->price);
    }

    public function scopeFilter($query, $filters)
    {
        // $filters = App\Filters\Filters.php@protected $filters=[]
        return $filters->apply($query); // App\Filters\Filters.php@apply()
    }
}
