<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - Base58 Financial Gateway Service
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    // SEPA Transfer & Transaction Core
    Route::post('/payments/sepa', 'PaymentController@initiateSepaTransfer');
    Route::get('/transactions/{reference}', 'TransactionController@details');

    // Settlement & Reconciliation (Compliance)
    Route::get('/settlements/active', 'SettlementController@activeBatches');
    Route::post('/reconcile/{batchId}', 'ReconciliationController@trigger');

    // SWIFT/Ebics Node Status
    Route::get('/system/node-health', 'InfrastructureController@checkNodes');
});
