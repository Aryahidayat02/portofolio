<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // 1. Ambil semua pesan (terbaru di atas)
        $contacts = Contact::latest()->paginate(10);

        // 2. OTOMATIS TANDAI SEMUA PESAN SEBAGAI "SUDAH DIBACA"
        // Ini akan membuat angka "Belum Dibaca" di dashboard menjadi 0
        Contact::where('is_read', false)->update(['is_read' => true]);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}