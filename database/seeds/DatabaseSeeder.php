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
        DB::table('users')->insert([
            'name'      => 'Maksym',
            'password'  =>  bcrypt('491242'),
            'email'     => str_random(5).'@gmail.com'
        ]);
         $this->call([
             UsersTableSeeder::class,
             CategoryTableSeeder::class,
             BrandsTableSeeder::class,
             CollectionsTableSeeder::class,
             ProductTableSeeder::class
         ]);
    }
}
