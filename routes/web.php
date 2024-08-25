<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::post('/', function () {
    //
})->name('coming-soon.submit');
