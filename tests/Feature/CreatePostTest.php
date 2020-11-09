<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_create_posts()
    {
        $post = Post::factory()->make();

        $response = $this->postJson(route('admin.posts.store', $post));

        $response->assertStatus(401);
    }

    /** @test */
    public function an_authenticated_user_can_create_posts()
    {
        $user = User::factory()->create();
        
        $post = Post::factory()->make();

        $this->actingAs($user);
        
        $response = $this->postJson(route('admin.posts.store'), $post);
        dd($post);
        $response->assertJson([
            'data' => ['body' => 'Post test']
        ]);

        // $this->assertDatabaseHas('posts', [
        //     'pos'
        // ])
    }

}
