<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('log-tools'));
});

Route::match(['get', 'post'], 'log-tools', function () {
    $viewData = [
        'apiUrl' => route('v1.legacy-query-sync-generator'),
    ];
    return view('log-tools', $viewData);
})->name('log-tools');

Route::group(['prefix' => 'practice/pattern', 'namespace' => 'Web\Practice'], function () {
    Route::get('decorator', 'PatternController@decorator');
    Route::get('factory', 'PatternController@factory');
    Route::get('observer', 'PatternController@observer');
});