@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-brand-600 dark:text-brand-400 hover:gap-3 font-semibold mb-6 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Kembali
    </a>
    <h1 class="text-3xl font-extrabold mb-2">Edit <span class="gradient-text">Project</span></h1>
    <p class="text-gray-600 dark:text-gray-400 mb-8">Perbarui informasi project.</p>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-brand-500/10 p-8 md:p-10 border border-gray-100 dark:border-gray-800">
        @csrf
        @method('PUT')
        @include('admin.projects._form')
        <button type="submit" class="w-full gradient-bg text-white px-6 py-4 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:-translate-y-0.5 transition-all mt-6">
            Update Project
        </button>
    </form>
</section>
@endsection