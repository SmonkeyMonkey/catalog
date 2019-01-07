<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Brand::class,15)->create();
    }
}
//->each(function ($brand){
//    $brand->product()->save(factory(App\Brand::class)->make());
//    $brand->collections()->save(factory(App\Brand::class)->make());
//    $brand->category()->save(factory(App\Brand::class)->make());
//}