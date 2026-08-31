<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $projects    = Project::latest()->paginate(12);
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.projects.index', compact('projects', 'unreadCount'));
    }

    public function create()
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.projects.create', compact('unreadCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:projects,slug',
            'category'          => 'required|string|max:255',
            'client_name'       => 'nullable|string|max:255',
            'location'          => 'nullable|string|max:255',
            'completion_date'   => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['features'] = array_filter($validated['features'] ?? []);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.projects.edit', compact('project', 'unreadCount'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'category'          => 'required|string|max:255',
            'client_name'       => 'nullable|string|max:255',
            'location'          => 'nullable|string|max:255',
            'completion_date'   => 'nullable|string|max:100',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'features'          => 'nullable|array',
            'features.*'        => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['features'] = array_filter($validated['features'] ?? []);

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
