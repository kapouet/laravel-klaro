<?php

use Illuminate\Support\Facades\Route;
use Kapouet\Klaro\Http\Controllers\AssetsController;

Route::get('klaro/js/{file}', [AssetsController::class, 'js'])->where('file', '\w+\.js(\.map)?');
Route::get('klaro/css/{file}', [AssetsController::class, 'css'])->where('file', '\w+\.css(\.map)?');
