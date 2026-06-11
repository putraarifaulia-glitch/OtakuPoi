<?php

use App\Http\Controllers\Api\AnimeController;
use App\Http\Controllers\Api\MangaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('anime')->group(function () {
    Route::get('/', [AnimeController::class, 'index']);
    Route::get('/{id}', [AnimeController::class, 'show']);
});

Route::prefix('manga')->group(function () {
    Route::get('/', [MangaController::class, 'index']);
    Route::get('/{id}', [MangaController::class, 'show']);
});
