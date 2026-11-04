@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <div class="mb-10">
        <h1 class="text-4xl font-extrabold mb-2">Dashboard <span class="gradient-text">Admin</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Selamat datang kembali, {{ Auth::user()->name }} 👋</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Projects</p>
            <p class="text-3xl font-extrabold">{{ $stats['projects'] }}</p>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 dark:bg-purple-900/30 flex items-center justify-center text-purple-600 dark:text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Skills</p>
            <p class="text-3xl font-extrabold">{{ $stats['skills'] }}</p>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Pesan</p>
            <p class="text-3xl font-extrabold">{{ $stats['contacts'] }}</p>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-900/30 flex items-center justify-center text-red-600 dark:text-red-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">Belum Dibaca</p>
            <p class="text-3xl font-extrabold text-red-600 dark:text-red-400">{{ $stats['unread_contacts'] }}</p>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-5">
        <a href="{{ route('admin.projects.index') }}" class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center text-white text-2xl">📁</div>
            <div class="flex-1">
                <h3 class="font-bold text-lg group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Kelola Projects</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Tambah, edit, hapus project</p>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center text-white text-2xl">⚡</div>
            <div class="flex-1">
                <h3 class="font-bold text-lg group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Kelola Skills</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Atur daftar keahlian</p>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>

        <a href="{{ route('admin.profile.edit') }}" class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center text-white text-2xl">👤</div>
            <div class="flex-1">
                <h3 class="font-bold text-lg group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Edit Profile</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Ubah info profil</p>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>

        <a href="{{ route('admin.contacts.index') }}" class="group bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center text-white text-2xl">📬</div>
            <div class="flex-1">
                <h3 class="font-bold text-lg group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Pesan Masuk</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Lihat pesan dari pengunjung</p>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-brand-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>
@endsection