@extends('layouts.app')

@section('title', 'Kelola Projects')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold">Kelola <span class="gradient-text">Projects</span></h1>
            <p class="text-gray-600 dark:text-gray-400">Total {{ $projects->total() }} project</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 gradient-bg text-white px-5 py-3 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:-translate-y-0.5 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Project
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-800/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Tech Stack</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($project->image)
                                        <img src="{{ Storage::url($project->image) }}" class="w-12 h-12 rounded-lg object-cover" alt="">
                                    @else
                                        <div class="w-12 h-12 rounded-lg gradient-bg flex items-center justify-center text-white text-lg">💼</div>
                                    @endif
                                    <span class="font-semibold">{{ $project->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $project->tech_stack }}</td>
                            <td class="px-6 py-4">
                                @if($project->is_featured)
                                    <span class="inline-flex items-center gap-1 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 px-3 py-1 rounded-full text-xs font-semibold">⭐ Featured</span>
                                @else
                                    <span class="bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 px-3 py-1 rounded-full text-xs font-semibold">Biasa</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 text-blue-600 dark:text-blue-400 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus project ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-16 text-center">
                            <div class="text-5xl mb-3">📭</div>
                            <p class="text-gray-500 dark:text-gray-400">Belum ada project. Yuk tambah!</p>
                        </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6">{{ $projects->links() }}</div>
</section>
@endsection