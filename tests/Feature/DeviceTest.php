<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Tests the device.show API
     *
     * @return void
     */
    public function testShowDevice()
    {
        $response = $this->get("/api/device/1");

        $response->assertStatus(200)->assertJsonCount(14);
    }

    /**
     * Tests the device.show API
     *
     * @return void
     */
    public function testCreateDevice()
    {
        $response = $this->postJson("/api/device/", [
            "serial" => "98765432",
            "oem" => "Auto",
            "model" => "Test",
            "cpu" => "Test 5000",
            "ram" => "16GB Test",
            "storage" => "1TB Test",
            "psu" => "400W Test",
            "mac" => "0011:TEST:TEST:TEST",
            "name" => "PC-TEST-987654",
            "os" => "TestOS",
        ]);

        $response->assertStatus(200)->assertJson([
            "status" => 201,
            "message" => "Success, new device created."
        ])->assertJsonCount(3);
    }
}


//  [
//     "id" => true,
//     "serial" => true,
//     "oem" => true,
//     "model" => true,
//     "cpu" => true,
//     "ram" => true,
//     "storage" => true,
//     "psu" => true,
//     "mac" => true,
//     "name" => true,
//     "os" => true,
//     "created_at" => true,
//     "updated_at" => true,
//     "deleted_at" => null
// ]
