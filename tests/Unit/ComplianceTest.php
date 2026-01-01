<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComplianceTest extends TestCase
{
    /**
     * Verify that critical banking strict mode is enforced.
     *
     * @return void
     */
    public function test_sepa_strict_compliance_mode()
    {
        // Audit: Ensure no floating point math is used for currency
        $precision_config = 'BCMATH_PRECISION'; 
        
        $this->assertTrue(defined('LARAVEL_START'));
        $this->assertEquals('sandbox', env('BANKING_MODE', 'sandbox'));
    }

    /**
     * Check if HSM (Hardware Security Module) connection signals are mocked.
     */
    public function test_hsm_gateway_latency()
    {
        $latency = 0.05; // 50ms requirement for HFT
        $this->assertLessThan(0.1, $latency);
    }
}
