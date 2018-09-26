<?php  

namespace App\Filters\Product;

use App\Category;
use App\Color;
use App\Filters\Filters;

class ProductFilters extends Filters
{
    /**
     * Filter name
     * 
     * @var array
     */
    protected $filters = ['category', 'price', 'color'];

    /**
     * Filter products by category
     * 
     * @param   string $slug
     * @return void
     */
    protected function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category->count()) 
        {
            $this->builder->whereHas('categories', function($query) use($slug){
                $query->whereSlug($slug);
            });
        }
    }

    /**
     * Filter products by price order
     * 
     * @param  string $order 
     * @return void
     */
    protected function price($order)
    {
        $orders = ['high_to_low', 'low_to_high'];

        if (in_array($order, $orders)) 
        {
            if ($order == 'high_to_low')
            {
               return $this->builder->orderBy('price', 'desc');
            }
            elseif($order == 'low_to_high') 
            {
                return $this->builder->orderBy('price', 'asc');
            }
        }
    }

    protected function color($slug)
    {
        $color = Color::where('slug', $slug)->first();

        if ($color->count()) 
        {
            $this->builder->whereHas('colors', function($query) use($slug){
                $query->whereSlug($slug);
            });
        }
    }
}