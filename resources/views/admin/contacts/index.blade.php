@extends('layouts.app')

@section('title', 'Pesan Masuk')

@section('content')
<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 animate-fade-up">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">Pesan <span class="gradient-text">Masuk</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Total {{ $contacts->total() }} pesan</p>
    </div>

    <div class="space-y-4">
        @forelse($contacts as $contact)
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-100 dark:border-gray-800 card-hover relative overflow-hidden">
                
                {{-- Indikator jika pesan belum dibaca (baru masuk) --}}
                @if(!$contact->is_read)
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-brand-500"></div>
                @endif

                <div class="flex justify-between items-start gap-4 mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($contact->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-lg flex items-center gap-2">
                                    {{ $contact->subject }}
                                    @if(!$contact->is_read)
                                        <span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full uppercase tracking-wider font-bold">Baru</span>
                                    @endif
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $contact->name }} · {{ $contact->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">{{ $contact->created_at->diffForHumans() }}</p>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Yakin hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed pl-13 mt-4">{{ $contact->message }}</p>
            </div>
        @empty
            <div class="text-center py-16 bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-800">
                <div class="text-6xl mb-4">📭</div>
                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada pesan masuk.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">{{ $contacts->links() }}</div>
</section>
@endsection