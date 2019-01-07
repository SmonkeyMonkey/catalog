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
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
