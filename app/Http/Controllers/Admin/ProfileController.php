<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first() ?? new Profile();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first() ?? new Profile();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'about_me' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'whatsapp' => 'nullable|string', // <-- Tambahan
            'location' => 'nullable|string',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',      // <-- Tambahan
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $validated['photo'] = $request->file('photo')->store('profile', 'public');
        }

        $profile->fill($validated)->save();

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profile berhasil diperbarui.');
    }
}