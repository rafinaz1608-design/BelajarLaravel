<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientAdminController extends Controller
{
    public function index()
    {
        $clients     = Client::latest()->paginate(20);
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.clients.index', compact('clients', 'unreadCount'));
    }

    public function create()
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.clients.create', compact('unreadCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'website'   => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('clients', 'public');
        }

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.clients.edit', compact('client', 'unreadCount'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'website'   => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($client->logo) Storage::disk('public')->delete($client->logo);
            $validated['logo'] = $request->file('logo')->store('clients', 'public');
        }

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil diperbarui.');
    }

    public function toggleActive(Client $client)
    {
        $client->update(['is_active' => !$client->is_active]);
        return back()->with('success', 'Status klien diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo) Storage::disk('public')->delete($client->logo);
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil dihapus.');
    }
}
