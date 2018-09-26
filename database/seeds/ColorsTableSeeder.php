<?php

use App\Color;
use App\Product;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['red', 'blue', 'green'];

        foreach ($colors as $color) 
        {
            factory(App\Color::class)->create([
                'name' => $color
            ]);
        }

    

        $products1 = Product::inRandomOrder()->take(10)->get();
        $color1 = Color::first();

        foreach ($products1 as $product) {
            $product->colors()->attach($color1);
        }

        $products2 = Product::inRandomOrder()->take(10)->get();
        $color2 = Color::find(2);

        foreach ($products2 as $product) {
            $product->colors()->attach($color2);
        }

        $products3 = Product::inRandomOrder()->take(10)->get();
        $color3 = Color::find(3);

        foreach ($products3 as $product) {
            $product->colors()->attach($color3);
        }
    }
}
