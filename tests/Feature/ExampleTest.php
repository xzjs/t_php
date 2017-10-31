<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //添加用户
        $response = $this->json('POST', '/users', ['name' => 'Sally', 'open_id' => uniqid()]);
        $response
            ->assertStatus(200)
            ->assertJson(['status' => true,]);
        $user_id = $response->json()['data'];

        //添加设备
        $data = [
            'mac' => uniqid(),
            'type' => 0,
        ];
        $response = $this->json('POST', '/devices', $data);
        $response
            ->assertStatus(200)
            ->assertJson(['status' => true,]);
        $device_id = $response->json()['data'];

        //绑定设备
        $data = [
            'user_id' => $user_id
        ];
        $response = $this->json('PUT', "/devices/$device_id", $data);
        $response->assertStatus(200)->assertJson(['status' => true,]);
    }
}
