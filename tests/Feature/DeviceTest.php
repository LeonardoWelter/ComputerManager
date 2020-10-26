<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Device;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    /**
     * Tests the device.index API endpoint
     *
     * @return void
     */
    public function testIndexDevice()
    {
        $response = $this->get('/api/device');

        $response->assertStatus(200);
    }

    /**
     * Tests the device.show API endpoint
     *
     * @return void
     */
    public function testShowDevice()
    {
        $response = $this->get("/api/device/1");

        $response->assertStatus(200)->assertJsonCount(14);
    }

    /**
     * Tests the device.store API endpoint
     *
     * @return void
     */
    public function testCreateDevice()
    {
        $response = $this->postJson("/api/device/", [
            "serial" => random_int(100, 999999),
            "oem" => "Auto",
            "model" => "Test",
            "cpu" => "Test 5000",
            "ram" => "16GB Test",
            "storage" => "1TB Test",
            "psu" => "400W Test",
            "mac" => random_int(100, 999999),
            "name" => "PC-TEST-987654",
            "os" => "TestOS",
        ]);

        $response->assertStatus(200)->assertJson([
            "status" => 201,
            "message" => "Success, new device created."
        ])->assertJsonCount(3);
    }

    /**
     * Tests the device.update API endpoint
     *
     * @return void
     */
    public function testUpdateDevice()
    {
        $device = Device::orderBy('created_at', 'desc')->first();

        $response = $this->putJson("/api/device/{$device['id']}", [
            "serial" => random_int(100, 999999),
            "oem" => "Updated",
            "model" => "Updated",
            "cpu" => "Updated",
            "ram" => "Updated",
            "storage" => "Updated",
            "psu" => "Updated",
            "mac" => random_int(100, 999999),
            "name" => "Updated",
            "os" => "Updated",
        ]);

        $response->assertStatus(200)->assertJson([
            "status" => 200,
            "message" => "Success, device updated."
        ])->assertJsonCount(3);
    }

    /**
     * Tests the device.delete API endpoint
     *
     * @return void
     */
    public function testDeleteDevice()
    {
        $device = Device::orderBy('created_at', 'desc')->first();

        $response = $this->delete("/api/device/{$device['id']}");

        $response->assertStatus(200)->assertJson([
            "status" => 200,
            "message" => "Success, device removed."
        ])->assertJsonCount(2);
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
