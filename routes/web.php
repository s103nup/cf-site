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
    return view('welcome');
});


/**
 * Superbalist/laravel-google-cloud-storage Demo Code
 */
Route::group(['prefix' => 'demo'], function () {
    Route::get('upload', function () {
        return view('demo.upload');
    });

    Route::post('store', function () {
        $name = 'uploadImage';
        $fileName = '';
        $object = request()->$name;
        if ($object->isValid()) {
            $fileName = $object->store('/', 'gcs');
        }
        $image = [
            'name' => $fileName,
            'url' => Illuminate\Support\Facades\Storage::url($fileName),
        ];
        return view('demo.display', ['image' => $image]);
    });
});
