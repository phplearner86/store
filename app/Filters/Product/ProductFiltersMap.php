<?php  

namespace App\Filters\Product;

use App\Category;
use App\Color;
use App\Filters\Filters;

class ProductFiltersMap extends Filters
{
    public static function mappings()
    {
        return [
            'category' => Category::all()->pluck('slug', 'name'),
            'color' => Color::all()->pluck('slug', 'name'),
            'price' => [
                'High to low' => 'high_to_low',
                'Low to high' => 'low_to_high',
            ]
        ];
    }
}