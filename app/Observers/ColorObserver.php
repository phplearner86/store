<?php  

namespace App\Observers;

use App\Color;


class ColorObserver{

    public function creating(Color $color)
    {
        $color->slug = str_slug($color->name);
    }
}