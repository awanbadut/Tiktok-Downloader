<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IslamicApiController;
use App\Http\Controllers\TikTokDownloadController;
use App\Services\IslamicApiService;

Route::get('/', function () {
    return view('welcome');
});






Route::get('/tiktok/video/form', [IslamicApiController::class, 'showForm']); // Route untuk menampilkan form input

Route::post('/tiktok/video', [IslamicApiController::class, 'showTikTokVideo']); // Route untuk menampilkan video setelah form dikirim
Route::get('/tiktok/video', [IslamicApiController::class, 'showTikTokVideo']); // Route untuk menampilkan video TikTok

Route::get('/tiktok/form', [IslamicApiController::class, 'showForm']); // Form input URL

Route::post('/tiktok/video', [IslamicApiController::class, 'showTikTokVideo']); // Kirim URL & tampilkan video



Route::get('/tiktok/download', [TikTokDownloadController::class, 'download'])->name('tiktok.download');



