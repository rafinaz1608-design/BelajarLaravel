<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\ClientAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\TestimonialAdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Product;     
use Illuminate\Support\Facades\Route;

// ============================================================
// Frontend Routes
// ============================================================
Route::get('/', function () {
    $services     = Service::all();
    $projects     = Project::all();
    $clients      = Client::where('is_active', true)->get();
    $testimonials = Testimonial::where('is_active', true)->get();
    $products     = Product::where('is_active', true)->get();
    return view('index', compact('services', 'projects', 'clients', 'testimonials', 'products'));
});

Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/proyek/{slug}',  [ProjectController::class, 'show'])->name('projects.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ============================================================
// Auth Routes
// ============================================================
Route::prefix('admin')->group(function () {
    Route::get('login',  [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('logout',[LoginController::class, 'logout'])->name('admin.logout');
});

// ============================================================
// Admin Routes (Protected)
// ============================================================
Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/', fn() => redirect()->route('admin.dashboard'));

    // Contacts / Pesan Masuk
    Route::get('contacts',                [ContactAdminController::class, 'index'])->name('admin.contacts.index');
    Route::get('contacts/{contact}',      [ContactAdminController::class, 'show'])->name('admin.contacts.show');
    Route::post('contacts/{contact}/read',   [ContactAdminController::class, 'markRead'])->name('admin.contacts.read');
    Route::post('contacts/{contact}/unread', [ContactAdminController::class, 'markUnread'])->name('admin.contacts.unread');
    Route::delete('contacts/{contact}',   [ContactAdminController::class, 'destroy'])->name('admin.contacts.destroy');

    // Services / Layanan
    Route::resource('services', ServiceAdminController::class)->names([
        'index'   => 'admin.services.index',
        'create'  => 'admin.services.create',
        'store'   => 'admin.services.store',
        'edit'    => 'admin.services.edit',
        'update'  => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ])->except(['show']);

    // Projects / Portofolio
    Route::resource('projects', ProjectAdminController::class)->names([
        'index'   => 'admin.projects.index',
        'create'  => 'admin.projects.create',
        'store'   => 'admin.projects.store',
        'edit'    => 'admin.projects.edit',
        'update'  => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ])->except(['show']);

    // Clients / Klien
    Route::resource('clients', ClientAdminController::class)->names([
        'index'   => 'admin.clients.index',
        'create'  => 'admin.clients.create',
        'store'   => 'admin.clients.store',
        'edit'    => 'admin.clients.edit',
        'update'  => 'admin.clients.update',
        'destroy' => 'admin.clients.destroy',
    ])->except(['show']);
    Route::post('clients/{client}/toggle', [ClientAdminController::class, 'toggleActive'])->name('admin.clients.toggle');

    // Testimonials
    Route::resource('testimonials', TestimonialAdminController::class)->names([
        'index'   => 'admin.testimonials.index',
        'create'  => 'admin.testimonials.create',
        'store'   => 'admin.testimonials.store',
        'edit'    => 'admin.testimonials.edit',
        'update'  => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ])->except(['show']);
    Route::post('testimonials/{testimonial}/toggle', [TestimonialAdminController::class, 'toggleActive'])->name('admin.testimonials.toggle');

    Route::resource('products', ProductAdminController::class)->names([
        'index'   => 'admin.products.index',
        'create'  => 'admin.products.create',
        'store'   => 'admin.products.store',
        'edit'    => 'admin.products.edit',
        'update'  => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ])->except(['show']);

    // Profile / Settings
    Route::get('profile',   [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile',   [ProfileController::class, 'update'])->name('admin.profile.update');
});
