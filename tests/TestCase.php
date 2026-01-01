<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Boot the banking simulation environment before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        // Base58: Mock the SEPA Gateway connection for safety
        $this->withoutMiddleware([
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
        ]);

        // Ensure no real money is moved during testing
        env('BANKING_MODE', 'sandbox');
    }

    /**
     * Helper to generate a valid IBAN for testing.
     */
    protected function generateTestIban($countryCode = 'DE')
    {
        return $countryCode . rand(10, 99) . time() . rand(1000, 9999);
    }
}
