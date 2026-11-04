@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-brand-600 dark:text-brand-400 hover:gap-3 font-semibold mb-6 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Kembali ke Dashboard
    </a>
    <h1 class="text-3xl font-extrabold mb-2">Edit <span class="gradient-text">Profile</span></h1>
    <p class="text-gray-600 dark:text-gray-400 mb-8">Perbarui informasi profil publik Anda.</p>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-brand-500/10 p-8 md:p-10 border border-gray-100 dark:border-gray-800">
        @csrf
        @method('PUT')

        <div class="space-y-5">
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-semibold">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all" required>
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $profile->title ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="Full Stack Developer" required>
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold">Bio Singkat <span class="text-red-500">*</span></label>
                <textarea name="bio" rows="3"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all resize-none"
                    placeholder="Tulis bio singkat untuk di bawah nama..."
                    required>{{ old('bio', $profile->bio ?? '') }}</textarea>
                @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold">Tentang Saya (Lengkap)</label>
                <textarea name="about_me" rows="6"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all resize-none"
                    placeholder="Ceritakan tentang dirimu secara lengkap...">{{ old('about_me', $profile->about_me ?? '') }}</textarea>
                @error('about_me') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-semibold">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all" required>
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all">
                    @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- TAMBAHAN: WHATSAPP -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-semibold">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="6281234567890">
                    <p class="text-xs text-gray-500 mt-1">Gunakan kode negara (contoh: 628...), tanpa tanda + atau spasi.</p>
                    @error('whatsapp') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="Jakarta, Indonesia">
                    @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-semibold">GitHub URL</label>
                    <input type="url" name="github" value="{{ old('github', $profile->github ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all">
                    @error('github') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $profile->linkedin ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all">
                    @error('linkedin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">Instagram URL</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $profile->instagram ?? '') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="https://instagram.com/username">
                    @error('instagram') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- TAMBAHAN: TIKTOK -->
            <div>
                <label class="block mb-2 text-sm font-semibold">TikTok URL</label>
                <input type="url" name="tiktok" value="{{ old('tiktok', $profile->tiktok ?? '') }}"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                    placeholder="https://tiktok.com/@username">
                @error('tiktok') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-semibold">Foto Profil</label>
                <input type="file" name="photo" accept="image/*"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white file:font-semibold hover:file:bg-brand-700 file:cursor-pointer">
                @if($profile->photo ?? false)
                    <div class="mt-3">
                        <img src="{{ Storage::url($profile->photo) }}" class="w-32 h-32 rounded-full object-cover border-4 border-brand-100 dark:border-brand-900">
                    </div>
                @endif
                @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full gradient-bg text-white px-6 py-4 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:-translate-y-0.5 transition-all">
                Update Profile
            </button>
        </div>
    </form>
</section>
@endsection