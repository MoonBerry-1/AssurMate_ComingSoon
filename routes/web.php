<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComingSoonController;

Route::prefix('/')->name('coming-soon.')->group(function () {
    Route::get('/', function () {
        return view('coming-soon');
    })->name('showForm');

    Route::post('/', [ComingSoonController::class, 'submit'])->middleware('throttle:10,1')->name('submit');
});

// Route de fallback pour rediriger vers '/'
Route::fallback(function () {
    return redirect('/');
});

