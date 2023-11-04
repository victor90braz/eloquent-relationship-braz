<?php

namespace Tests\Feature;

use Tests\TestCase;

class LikeNotesTest extends TestCase
{
    /** @test */
    public function a_note_can_be_liked()
    {
        $this->actingAs(\App\Models\User::factory()->create());

        $note = \App\Models\Note::factory()->create();

        $note->like();

        $this->assertCount(1, $note->likes);
        $this->assertTrue($note->likes->contains('id', auth()->id()));
    }
}
