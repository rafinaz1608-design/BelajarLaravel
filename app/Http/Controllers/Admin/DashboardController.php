<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use App\Models\Testimonial;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $unreadCount     = Contact::where('status', 'unread')->count();
        $totalProjects   = Project::count();
        $activeServices  = Service::count();
        $totalClients    = Client::count();
        $totalTestimonials = Testimonial::count();
        $totalProducts   = Product::count();    
        $recentContacts  = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'unreadCount',
            'totalProjects',
            'activeServices',
            'totalClients',
            'totalTestimonials',
            'totalProducts',
            'recentContacts'
        ));
    }
}
