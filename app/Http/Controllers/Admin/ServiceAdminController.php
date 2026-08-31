<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceAdminController extends Controller
{
    public function index()
    {
        $services    = Service::latest()->paginate(12);
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.services.index', compact('services', 'unreadCount'));
    }

    public function create()
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.services.create', compact('unreadCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug',
            'icon'              => 'nullable|string|max:100',
            'color_class'       => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'catalog_pdf'       => 'nullable|mimes:pdf|max:10240',
            'catalog_doc'       => 'nullable|mimes:doc,docx|max:10240',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['features'] = array_filter($validated['features'] ?? []);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }
        if ($request->hasFile('catalog_pdf')) {
            $validated['catalog_pdf'] = $request->file('catalog_pdf')->store('catalogs', 'public');
        }
        if ($request->hasFile('catalog_doc')) {
            $validated['catalog_doc'] = $request->file('catalog_doc')->store('catalogs', 'public');
        }

        Service::create($validated);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.services.edit', compact('service', 'unreadCount'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'icon'              => 'nullable|string|max:100',
            'color_class'       => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'catalog_pdf'       => 'nullable|mimes:pdf|max:10240',
            'catalog_doc'       => 'nullable|mimes:doc,docx|max:10240',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['features'] = array_filter($validated['features'] ?? []);

        if ($request->hasFile('image')) {
            if ($service->image) Storage::disk('public')->delete($service->image);
            $validated['image'] = $request->file('image')->store('services', 'public');
        }
        if ($request->hasFile('catalog_pdf')) {
            if ($service->catalog_pdf) Storage::disk('public')->delete($service->catalog_pdf);
            $validated['catalog_pdf'] = $request->file('catalog_pdf')->store('catalogs', 'public');
        }
        if ($request->hasFile('catalog_doc')) {
            if ($service->catalog_doc) Storage::disk('public')->delete($service->catalog_doc);
            $validated['catalog_doc'] = $request->file('catalog_doc')->store('catalogs', 'public');
        }

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) Storage::disk('public')->delete($service->image);
        if ($service->catalog_pdf) Storage::disk('public')->delete($service->catalog_pdf);
        if ($service->catalog_doc) Storage::disk('public')->delete($service->catalog_doc);
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
