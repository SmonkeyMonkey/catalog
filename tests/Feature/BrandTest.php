<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
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
    public function admin_create_new_brand()
    {
        \Session::start();
        \Storage::fake('images');
        $admin = factory(User::class)->create();
        $response = $this->actingAs($admin)->json('post', 'admin/brand', [
            'title' => 'this is title',
            'about' => 'here text text text text',
            'description' => 'and description asddsa',
            'image' => UploadedFile::fake()->image('no-img.jpg'),
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);
        tap(Brand::first(),function ($brand){
           $this->assertEquals('this is title',$brand->title);
           $this->assertEquals('here text text text text',$brand->about);
           $this->assertEquals('and description asddsa',$brand->description);
           \Storage::disk('images')->assertMissing('files/no-img.jpg');
        });
    }
    /** @test */
    public function admin_can_delete_brand(){
        $this->withoutMiddleware();
        $response = $this->delete('admin/brand/1');
        $this->assertEquals(302,$response->getStatusCode());
    }
}
