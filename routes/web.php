<?php

use App\Http\Controllers\Web\AnimeListController;
use App\Http\Controllers\Web\GenreController;
use App\Http\Controllers\Web\StudioController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\AnimeController;
use App\Http\Controllers\Web\MangaController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Language Switcher
Route::get('/set-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'id', 'ja'])) {
        session(['language' => $lang]);
    }
    return back();
})->name('set-language');

// Public Landing Page
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Auth Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

// Dashboard & User Features (Auth protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Feedback
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    // Anime List
    Route::get('/my-list', [AnimeListController::class, 'index'])->name('anime-list.index');
    Route::post('/anime-list', [AnimeListController::class, 'store'])->name('anime-list.store');
    Route::put('/anime-list/{id}', [AnimeListController::class, 'update'])->name('anime-list.update');
    Route::delete('/anime-list/{id}', [AnimeListController::class, 'destroy'])->name('anime-list.destroy');
});

// Anime Explorations
Route::controller(AnimeController::class)->prefix('anime')->name('anime.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

// Manga Explorations
Route::controller(MangaController::class)->prefix('manga')->name('manga.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

// Genre
Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/{id}', [AnimeController::class, 'byGenre'])->name('genre.show');

// Studio
Route::get('/studio', [StudioController::class, 'index'])->name('studio.index');
