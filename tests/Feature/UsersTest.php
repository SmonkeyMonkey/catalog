<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\News;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function user_can_see_home_page()
    {
        $user = factory(User::class)->create();
        $this->get('/')
            ->assertStatus(200);
    }
    /** @test */
    public function non_auth_user_dont_see_admin_panel(){
        $user = factory(User::class)->create();
        $this->get('/admin')
            ->assertStatus(404);
    }
    /** @test */
    public function auth_user_can_see_admin_panel(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(200)->assertSee('Это админка');
    }
    /** @test */
    public function admin_can_create_new_news(){
        \Session::start();
        $this->withoutExceptionHandling();
        $admin = factory(User::class)->create();
        $response = $this->actingAs($admin)->json('post','admin/news',[
            'title' => 'test title',
            'text'  => 'textkkk',
            'description' => 'test description',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(302);
        tap(News::first(),function ($payment){
           $this->assertEquals('test title',$payment->title);
           $this->assertEquals('textkkk',$payment->text);
           $this->assertEquals('test description',$payment->description);
        });
    }
    /** @test */
    public function non_auth_user_trying_create_news(){
        \Session::start();
        $user=factory(User::class)->create();
        $response = $this->post('admin/news',[
            'title' => 'test title',
            'text'  => 'textkkk',
            'description' => 'test description',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(404);
    }
}
