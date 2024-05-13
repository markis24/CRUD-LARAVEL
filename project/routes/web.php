<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ProjectesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('membres', MembresController::class);
    Route::resource('articles', ArticlesController::class);
    Route::resource('projectes', ProjectesController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/app/{any}', function () {
    return view('app');
})->where('any', '.*');
