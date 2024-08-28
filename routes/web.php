<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\EmailController;

Route::prefix('/')->name('coming-soon.')->group(function () {
    Route::get('/', function () {
        return view('coming-soon');
    })->name('showForm');
    
    Route::post('/', [ComingSoonController::class, 'submit'])->middleware('throttle:10,1')->name('submit');
    
    Route::get('/send-email', [EmailController::class, 'sendEmail']);
});




