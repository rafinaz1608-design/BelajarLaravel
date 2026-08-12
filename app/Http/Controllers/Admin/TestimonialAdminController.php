<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialAdminController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        $unreadCount  = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.testimonials.index', compact('testimonials', 'unreadCount'));
    }

    public function create()
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.testimonials.create', compact('unreadCount'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'role'        => 'nullable|string|max:255',
            'content'     => 'required|string',
            'rating'      => 'required|integer|min:1|max:5',
            'is_active'   => 'boolean',
            'avatar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
        return view('admin.testimonials.edit', compact('testimonial', 'unreadCount'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'role'        => 'nullable|string|max:255',
            'content'     => 'required|string',
            'rating'      => 'required|integer|min:1|max:5',
            'is_active'   => 'boolean',
            'avatar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) Storage::disk('public')->delete($testimonial->avatar);
            $validated['avatar'] = $request->file('avatar')->store('testimonials', 'public');
        }

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function toggleActive(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);
        return back()->with('success', 'Status testimoni diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) Storage::disk('public')->delete($testimonial->avatar);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
