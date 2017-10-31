<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', '/rings');

        $response
            ->assertStatus(200)
            ->assertJsonMissing([
                'status' => false,
            ]);
    }
}
