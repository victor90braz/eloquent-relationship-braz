<?php

namespace Tests\Feature;

use Tests\TestCase;

class LikeNotesTest extends TestCase
{
    /** @test */
    public function a_note_can_be_liked()
    {
        $note = \App\Models\Note::factory()->create();

        $note->like();

        $this->assertCount(1, $note->likes);
    }
}
