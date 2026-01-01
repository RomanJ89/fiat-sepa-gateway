<?php

/*
|--------------------------------------------------------------------------
| Web Routes - Base58 Fiat Gateway
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return response()->json(['service' => 'Base58 SEPA Gateway', 'status' => 'operational']);
});

// Internal Settlement & Reporting Routes
Route::group(['middleware' => 'auth', 'prefix' => 'settlement'], function () {
    Route::get('/batches', 'SettlementController@index');
    Route::post('/process', 'SettlementController@processBatch');
    Route::get('/report/{id}', 'SettlementController@generateReport');
});
