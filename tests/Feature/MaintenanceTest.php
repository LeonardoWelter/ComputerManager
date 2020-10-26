<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Maintenance;
use Tests\TestCase;

class MaintenanceTest extends TestCase
{

    /**
     * Tests the maintenance.index API endpoint
     *
     * @return void
     */
    public function testIndexMaintenance()
    {
        $response = $this->get('/api/maintenance');

        $response->assertStatus(200);
    }

    /**
     * Tests the maintenance.show API endpoint
     *
     * @return void
     */
    public function testShowMaintenance()
    {
        $response = $this->get("/api/maintenance/3");

        $response->assertStatus(200)->assertJsonCount(10);
    }

    /**
     * Tests the maintenance.store API endpoint
     *
     * @return void
     */
    public function testCreateMaintenance()
    {
        $response = $this->postJson("/api/maintenance/", [
            'device_id' => random_int(1,2),
            'type' => 'Hardware',
            'subtype' => 'Instalação',
            'description' => 'Something',
            'comments' => 'Something something',
            'user_id' => '2',
        ]);

        $response->assertStatus(200)->assertJson([
            "status" => 201,
            "message" => "Success, new maintenance created."
        ])->assertJsonCount(3);
    }

    /**
     * Tests the maintenance.update API endpoint
     *
     * @return void
     */
    public function testUpdateMaintenance()
    {
        $maintenance = Maintenance::orderBy('created_at', 'desc')->first();

        $response = $this->putJson("/api/maintenance/{$maintenance['id']}", [
            'device_id' => random_int(1,2),
            'type' => 'Updated',
            'subtype' => 'Updated',
            'description' => 'Updated',
            'comments' => 'Updated',
            'user_id' => random_int(1, 3),
        ]);

        $response->assertStatus(200)->assertJson([
            "status" => 200,
            "message" => "Success, maintenance updated."
        ])->assertJsonCount(3);
    }

    /**
     * Tests the maintenance.delete API endpoint
     *
     * @return void
     */
    public function testDeleteMaintenance()
    {
        $maintenance = Maintenance::orderBy('created_at', 'desc')->first();

        $response = $this->delete("/api/maintenance/{$maintenance['id']}");

        $response->assertStatus(200)->assertJson([
            "status" => 200,
            "message" => "Success, maintenance removed."
        ])->assertJsonCount(2);
    }

}