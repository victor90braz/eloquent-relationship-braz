<?php

namespace Tests\Feature;

use App\Models\Opnion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikingTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_note_can_be_liked()
    {
        $this->actingAs(\App\Models\User::factory()->create());

        $note = \App\Models\Note::factory()->create();

        $note->like();

        $this->assertCount(1, $note->likes);
        $this->assertTrue($note->likes->contains('id', auth()->id()));
    }

    public function an_option_can_be_liked()
    {
        $this->actingAs(\App\Models\User::factory()->create());

        $option = Opnion::factory()->create();

        // Like the option
        $option->like();

        // Retrieve the likes and count them
        $likeCount = $option->likes->count();

        $this->assertEquals(1, $likeCount);
    }
}
