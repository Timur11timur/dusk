<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_view_index_of_posts()
    {
        $post = Post::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Posts');
        });
    }
}
