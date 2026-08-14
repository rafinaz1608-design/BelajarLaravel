<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index(Request $request)
    {
        $filter   = $request->get('status', 'all');
        $query    = Contact::latest();

        if ($filter === 'unread') {
            $query->where('status', 'unread');
        } elseif ($filter === 'read') {
            $query->where('status', 'read');
        }

        $contacts     = $query->paginate(15);
        $unreadCount  = Contact::where('status', 'unread')->count();

        return view('admin.contacts.index', compact('contacts', 'filter', 'unreadCount'));
    }

    public function show(Contact $contact)
    {
        // Auto-mark as read when opened
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        $unreadCount = Contact::where('status', 'unread')->count();
        return view('admin.contacts.show', compact('contact', 'unreadCount'));
    }

    public function markRead(Contact $contact)
    {
        $contact->update(['status' => 'read']);
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function markUnread(Contact $contact)
    {
        $contact->update(['status' => 'unread']);
        return back()->with('success', 'Pesan ditandai belum dibaca.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
