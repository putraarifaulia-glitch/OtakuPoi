<?php

use App\Http\Controllers\Api\AnimeController;
use App\Http\Controllers\Api\MangaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Version 1
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    
    // User Authentication Required Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        
        // Personal List Management (Future Implementation)
        // Route::post('/list/anime', [UserListController::class, 'addAnime']);
    });

    // Public Anime Endpoints
    Route::prefix('anime')->name('api.anime.')->group(function () {
        Route::get('/', [AnimeController::class, 'index'])->name('index');
        Route::get('/{id}', [AnimeController::class, 'show'])->name('show');
    });

    // Public Manga Endpoints
    Route::prefix('manga')->name('api.manga.')->group(function () {
        Route::get('/', [MangaController::class, 'index'])->name('index');
        Route::get('/{id}', [MangaController::class, 'show'])->name('show');
    });

});
