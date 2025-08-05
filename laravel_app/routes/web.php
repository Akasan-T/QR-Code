<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CameraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/camera', function () {
    return view('camera');
});

Route::post('/camera/upload', [CameraController::class, 'upload'])->name('camera.upload');