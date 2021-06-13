<?php

namespace Tests\Browser;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_view_index_of_posts()
    {
        $postOne = Post::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $postTwo = Post::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->browse(function (Browser $browser) use ($postOne, $postTwo) {
            $browser->visit('/')
                ->assertSee('Posts')
                ->assertSee($postOne->title)
                ->assertSee('by ' . $postOne->user->name)
                ->assertSee($postTwo->title)
                ->assertSee('by ' . $postTwo->user->name);
        });
    }

    /** @test */
    public function can_view_a_single_post()
    {
        $post = Post::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->browse(function (Browser $browser) use ($post) {
            $browser->visit(route('posts.show', $post->id))
                ->assertSee('Post')
                ->assertSee($post->title)
                ->assertSee('By: ' . $post->user->name)
                ->assertSee($post->text);
        });
    }

    /** @test */
    public function can_create_a_post()
    {
        $post = Post::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->browse(function (Browser $browser) use ($post) {
            $browser->loginAs($post->user)
                ->visit('/')
                ->assertSee('Create Post')
                ->clickLink('Create Post')
                ->type('title', 'My first post')
                ->type('text', 'My first text')
                ->click('button[type="submit"]')
                ->assertSee('Post successfully created')
                ->assertSee('My first post')
                ->assertPathIs('/');
        });
    }
}
