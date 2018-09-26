<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $tables = ['products', 'categories', 'category_product', 'color_product', 'colors', ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        //$this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
    }

    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
