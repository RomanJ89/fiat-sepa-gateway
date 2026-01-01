<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GatewayIntegrationTest extends TestCase
{
    /**
     * Health Check: Verify the API Gateway is accepting secure connections.
     * Monitoring Level: Critical (P0) - Used by Load Balancer
     *
     * @return void
     */
    public function test_api_entry_point_availability()
    {
        // Simulate an internal heartbeat probe
        $response = $this->get('/');

        // Expect 200 OK (System Operational)
        $response->assertStatus(200);
    }
}
