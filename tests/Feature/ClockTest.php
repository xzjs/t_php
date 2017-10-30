<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ClockTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'repeat_type' => '{"type":"array","data":[1,2,3,4,5,6,7]}',
            'duration' => 10,
            'delete' => false,
            'remark' => '我爱中国共产党',
            'time' => date("Y-m-d h:i:s"),
            'device_id' => 1,
            'rings'=>[1,2,3]
        ];
        $response = $this->json('POST', '/clocks', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }
}
