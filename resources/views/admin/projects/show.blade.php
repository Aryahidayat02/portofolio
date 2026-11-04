@extends('layouts.app')

@section('title', $project->title)

@section('content')
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-brand-600 dark:text-brand-400 hover:gap-3 font-semibold mb-8 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        Kembali ke Projects
    </a>

    @if($project->is_featured)
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-sm font-semibold mb-4 border border-yellow-200 dark:border-yellow-800">
            ⭐ Featured Project
        </div>
    @endif

    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">{{ $project->title }}</h1>

    <div class="flex flex-wrap gap-2 mb-8">
        @foreach(explode(',', $project->tech_stack) as $tech)
            <span class="px-4 py-1.5 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-sm font-semibold">{{ trim($tech) }}</span>
        @endforeach
    </div>

    @if($project->image)
        <div class="rounded-3xl overflow-hidden mb-10 shadow-2xl">
            <img src="{{ Storage::url($project->image) }}" class="w-full" alt="{{ $project->title }}">
        </div>
    @endif

    <div class="prose prose-lg dark:prose-invert max-w-none mb-10 text-gray-700 dark:text-gray-300 leading-relaxed">
        <p>{{ $project->description }}</p>
    </div>

    <div class="flex flex-wrap gap-4">
        {{-- TOMBOL LIVE DEMO SUDAH DIHAPUS --}}
        
        @if($project->github_link)
            <a href="{{ $project->github_link }}" target="_blank" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold border-2 border-gray-200 dark:border-gray-700 hover:border-gray-800 dark:hover:border-white transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                Lihat Repository GitHub
            </a>
        @endif
    </div>
</section>
@endsection