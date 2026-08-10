<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = Service::all();
    return view('index', compact('services'));
});

Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


