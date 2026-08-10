<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = Service::all();
    $projects = Project::all();
    $clients = Client::where('is_active', true)->get();
    $testimonials = Testimonial::where('is_active', true)->get();
    return view('index', compact('services', 'projects', 'clients', 'testimonials'));
});

Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/proyek/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



