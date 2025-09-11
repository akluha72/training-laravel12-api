<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('categories', [CategoryController::class, 'index']);
// Route::get('categories/{category}', [categoryController::class, 'show']);
// Route::get('lists/categories', [CategoryController::class, 'list']);
// Route::post('categories',[CategoryController::class, 'store']);
// Route::put('categories/{category}', [CategoryController::class, 'update']);
// Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');

    Route::get('products', [ProductController::class, 'index'])
        ->middleware('throttle:products');
});
