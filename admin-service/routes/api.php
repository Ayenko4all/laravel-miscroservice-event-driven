<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource(name:'products', controller: ProductController::class);
Route::get('user',UserController::class);
