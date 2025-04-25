<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
