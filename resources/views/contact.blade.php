@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-12 animate-fade-up">
        <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Get in touch</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Hubungi <span class="gradient-text">Saya</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Punya pertanyaan atau ingin bekerja sama? Hubungi saya melalui sosial media atau kirim pesan langsung.</p>
    </div>

    <!-- TOMBOL SOSIAL MEDIA (LANGSUNG KE APLIKASI) -->
    @if($profile)
    <div class="grid sm:grid-cols-3 gap-4 mb-10 animate-fade-up" style="animation-delay: 0.1s">
        <!-- WhatsApp -->
        @if($profile->whatsapp)
            @php
                // Membersihkan karakter aneh, hanya menyisakan angka
                $waNumber = preg_replace('/[^0-9]/', '', $profile->whatsapp);
            @endphp
            <a href="https://wa.me/{{ $waNumber }}?text=Halo%20{{ urlencode($profile->name) }},%20saya%20tertarik%20bekerja%20sama." target="_blank"
               class="group flex items-center justify-center gap-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 hover:bg-green-100 dark:hover:bg-green-900/50 p-4 rounded-2xl transition-all">
                <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </div>
                <div>
                    <p class="font-bold text-green-700 dark:text-green-400">WhatsApp</p>
                    <p class="text-xs text-green-600 dark:text-green-500">Chat langsung</p>
                </div>
            </a>
        @endif

        <!-- Instagram -->
        @if($profile->instagram)
            <a href="{{ $profile->instagram }}" target="_blank"
               class="group flex items-center justify-center gap-3 bg-pink-50 dark:bg-pink-900/30 border border-pink-200 dark:border-pink-800 hover:bg-pink-100 dark:hover:bg-pink-900/50 p-4 rounded-2xl transition-all">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-500 text-white flex items-center justify-center shadow-lg shadow-pink-500/30 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </div>
                <div>
                    <p class="font-bold text-pink-700 dark:text-pink-400">Instagram</p>
                    <p class="text-xs text-pink-600 dark:text-pink-500">Lihat keseharian</p>
                </div>
            </a>
        @endif

        <!-- TikTok -->
        @if($profile->tiktok)
            <a href="{{ $profile->tiktok }}" target="_blank"
               class="group flex items-center justify-center gap-3 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-700 p-4 rounded-2xl transition-all">
                <div class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center shadow-lg shadow-gray-500/30 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                </div>
                <div>
                    <p class="font-bold text-gray-800 dark:text-gray-200">TikTok</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Tonton video</p>
                </div>
            </a>
        @endif
    </div>
    @endif

    <!-- FORM PESAN -->
    <form action="{{ route('contact.store') }}" method="POST" class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-brand-500/10 p-8 md:p-10 border border-gray-100 dark:border-gray-800 animate-fade-up" style="animation-delay: 0.2s">
        @csrf
        <div class="space-y-6">
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-semibold">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="Nama lengkap" required>
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="email@example.com" required>
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-semibold">Subjek</label>
                <input type="text" name="subject" value="{{ old('subject') }}"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                    placeholder="Tentang apa?" required>
                @error('subject') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-semibold">Pesan</label>
                <textarea name="message" rows="6"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all resize-none"
                    placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="w-full gradient-bg text-white px-8 py-4 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 hover:-translate-y-0.5 transition-all">
                Kirim Pesan →
            </button>
        </div>
    </form>
</section>
@endsection