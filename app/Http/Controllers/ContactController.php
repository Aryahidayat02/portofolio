<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Profile; // <-- Pastikan ini ada
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        // Mengambil data profil pertama dari database
        $profile = Profile::first(); 
        
        // Mengirim data $profile ke view 'contact'
        return view('contact', compact('profile')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contact.create')
            ->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera menghubungi Anda.');
    }
}