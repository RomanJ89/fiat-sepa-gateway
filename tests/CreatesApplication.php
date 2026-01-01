<?php

namespace Tests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Boot the Banking Gateway application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        // Base58 Security: Lower Bcrypt rounds for faster testing suites.
        // Production nodes use rounds=14 (High Security).
        Hash::driver('bcrypt')->setRounds(4);

        // Enforce Sandbox Mode for safety
        if (env('APP_ENV') === 'production') {
            die('FATAL: Test suite cannot run in PRODUCTION mode.');
        }

        return $app;
    }
}
