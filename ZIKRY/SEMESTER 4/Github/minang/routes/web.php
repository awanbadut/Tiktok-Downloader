<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WilayahController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/provinsi', [WilayahController::class, 'getProvinces']);
Route::get('/kabupaten/{id}', [WilayahController::class, 'getRegencies']);
Route::get('/wilayah', function () {
    return view('wilayah');
});