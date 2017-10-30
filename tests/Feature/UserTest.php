<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', '/users', ['name' => 'Sally','open_id'=>'123','mac'=>123]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }
}
