<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/service-details', function () {
    return view('service-details');
})->name('service-details');

Route::get('/starter-page', function () {
    return view('starter-page');
})->name('starter-page');
