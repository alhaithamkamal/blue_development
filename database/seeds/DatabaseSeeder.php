<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        factory(App\Product::class,10)->create();
        factory(App\Brand::class,10)->create();
        factory(App\Category::class,10)->create();
    }
}
