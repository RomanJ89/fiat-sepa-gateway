<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels - Base58 Internal Notifications
|--------------------------------------------------------------------------
*/

// Authentication for private settlement monitoring channels
Broadcast::channel('settlement.{batchId}', function ($user, $batchId) {
    // Only authorized audit and settlement officers can listen to these updates
    return $user->hasRole('settlement_officer');
});

// Secure channel for real-time SWIFT node status alerts
Broadcast::channel('gateway.nodes.{nodeId}', function ($user, $nodeId) {
    return $user->can('monitor-infrastructure');
});
