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

Route::group(['prefix' => 'v1'], function () {
    $version = 'v1';
    Route::get('log/legacy-query-sync-generator', 'Api\Log\ToolsController@legacyQuerySyncGenerator')
        ->name($version . '.legacy-query-sync-generator');
});
