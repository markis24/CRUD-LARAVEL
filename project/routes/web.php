<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('membres', MembresController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
