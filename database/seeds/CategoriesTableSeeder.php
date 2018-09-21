<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['women', 'men', 'kids', 'accessories'];

        foreach ($categories as $category) {
            factory(App\Category::class)->create([
                'name' => $category
            ]);
        }

        $products1 = Product::inRandomOrder()->take(5)->get();
        $category1 = Category::first();

        foreach ($products1 as $product) {
            $product->categories()->attach($category1);
        }

        $products2 = Product::inRandomOrder()->take(5)->get();
        $category2 = Category::find(2);

        foreach ($products2 as $product) {
            $product->categories()->attach($category2);
        }

        $products3 = Product::inRandomOrder()->take(5)->get();
        $category3 = Category::find(3);

        foreach ($products3 as $product) {
            $product->categories()->attach($category3);
        }
    }
}
