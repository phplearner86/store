<?php  

namespace App\Observers;

use App\Category;

class CategoryObserver{

    public function creating(Category $category)
    {
        $category->slug = str_slug($category->name);
    }
}