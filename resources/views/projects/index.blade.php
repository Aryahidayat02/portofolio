@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16 animate-fade-up">
        <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Portfolio</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Semua <span class="gradient-text">Projects</span></h1>
        <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Kumpulan project yang pernah saya kerjakan.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group bg-white dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-lg card-hover block">
                <div class="relative h-52 overflow-hidden">
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $project->title }}">
                    @else
                        <div class="w-full h-full gradient-bg flex items-center justify-center text-6xl opacity-80">💼</div>
                    @endif
                    @if($project->is_featured)
                        <div class="absolute top-3 right-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-brand-600 dark:text-brand-400">⭐ Featured</div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">{{ $project->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                            <span class="px-3 py-1 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-xs font-medium">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                    <span class="inline-flex items-center gap-1 text-brand-600 dark:text-brand-400 font-semibold text-sm group-hover:gap-2 transition-all">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center py-16">
                <div class="text-6xl mb-4">📭</div>
                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada project.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12 flex justify-center">
        {{ $projects->links() }}
    </div>
</section>
@endsection