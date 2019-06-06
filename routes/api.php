<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'namespace' => 'API' ], function() {
    Route::resource('/dispensers', 'DispenserController', [
        'except' => ['edit', 'create']
    ]);

    Route::get('/dispensers/{dispenser}/sales', 'DispenserSaleController@index');

    Route::post('/dispensers/{dispenser}/sales', 'DispenserSaleController@store');

    Route::resource('/tanks', 'TankController', [
        'except' => ['edit', 'create']
    ]);

    Route::get('/tanks/{tank}/stock', 'TankStockController@index');

    Route::post('/tanks/{tank}/stock', 'TankStockController@store');
});

