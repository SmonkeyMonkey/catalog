<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Brand;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function admin_create_new_brand(){
        \Session::start();
        $brand = factory(Brand::class)->create();
        $admin = factory(User::class)->create();
        $response = $this->actingAs($admin)->json('post','admin/brand',[
            'title' => 'this is title ',
            'about'  => 'here text text text text',
            'description' => 'and description asddsa',
            'brand_id' => 1,
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);
    }
}
