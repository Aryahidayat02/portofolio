@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 -left-40 w-96 h-96 bg-brand-300/30 dark:bg-brand-700/20 rounded-full blur-3xl"></div>
        <div class="absolute top-40 -right-40 w-96 h-96 bg-purple-300/30 dark:bg-purple-700/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-sm font-semibold mb-6 border border-brand-200 dark:border-brand-800">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    Available for work
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-6">
                    Hi, Saya <br>
                    <span class="gradient-text">{{ $profile->name ?? 'Developer' }}</span>
                </h1>
                <p class="text-2xl md:text-3xl font-semibold text-gray-600 dark:text-gray-400 mb-6">{{ $profile->title ?? '' }}</p>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-lg leading-relaxed">{{ $profile->bio ?? '' }}</p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact.create') }}" class="group inline-flex items-center gap-2 gradient-bg text-white px-7 py-3.5 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/40 hover:-translate-y-0.5 transition-all">
                        Hubungi Saya
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold border-2 border-gray-200 dark:border-gray-700 hover:border-brand-500 dark:hover:border-brand-400 hover:text-brand-600 dark:hover:text-brand-400 hover:-translate-y-0.5 transition-all">
                        Lihat Projects
                    </a>
                </div>
            </div>

            <!-- FOTO PROFIL -->
            <div class="relative flex justify-center">
                <div class="relative w-80 h-80 md:w-96 md:h-96">
                    <div class="absolute inset-0 gradient-bg rounded-full blur-2xl opacity-30 animate-pulse"></div>
                    <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-2xl animate-float">
                        @if($profile && $profile->photo)
                            <img src="{{ Storage::url($profile->photo) }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full gradient-bg flex items-center justify-center">
                                <span class="text-[10rem]">👨‍💻</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION TENTANG SAYA -->
<section class="py-20 bg-gray-50 dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Teks Tentang Saya -->
            <div class="animate-fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Tentang <span class="gradient-text">Saya</span></h2>
                
                <div class="prose prose-lg dark:prose-invert text-gray-600 dark:text-gray-400 leading-relaxed mb-8">
                    @if($profile && $profile->about_me)
                        {!! nl2br(e($profile->about_me)) !!}
                    @else
                        <p class="italic text-gray-400">Belum ada deskripsi tentang saya. Silakan isi di menu Edit Profile -> Tentang Saya.</p>
                    @endif
                </div>

                <!-- Info Detail (Lokasi, Email, dll) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if($profile && $profile->location)
                    <div class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/50 flex items-center justify-center text-brand-600 dark:text-brand-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Lokasi</p>
                            <p class="font-medium">{{ $profile->location }}</p>
                        </div>
                    </div>
                    @endif

                    @if($profile && $profile->email)
                    <div class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/50 flex items-center justify-center text-brand-600 dark:text-brand-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Email</p>
                            <p class="font-medium">{{ $profile->email }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Dekorasi Kanan -->
            <div class="relative hidden md:block">
                <div class="absolute inset-0 gradient-bg rounded-3xl opacity-10 dark:opacity-20 transform rotate-3 scale-105"></div>
                <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-xl">
                    <div class="text-6xl mb-4">💡</div>
                    <h3 class="text-2xl font-bold mb-4">Visi Saya</h3>
                    <p class="text-gray-600 dark:text-gray-400 italic">
                        "Membangun solusi digital yang tidak hanya berfungsi dengan baik, tetapi juga memberikan pengalaman pengguna yang luar biasa dan menyenangkan."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section class="py-20 bg-white dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Expertise</span>
            <h2 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Skills & <span class="gradient-text">Tech Stack</span></h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Teknologi yang saya kuasai untuk membangun produk digital yang berkualitas.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach($skills as $category => $categorySkills)
                <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8 border border-gray-100 dark:border-gray-800 card-hover">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center text-white">
                            @if($category == 'frontend') 🎨
                            @elseif($category == 'backend') ⚙️
                            @elseif($category == 'database') 🗄️
                            @elseif($category == 'tools') 🛠️
                            @else 💻
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold capitalize">{{ $category }}</h3>
                    </div>
                    <div class="space-y-4">
                        @foreach($categorySkills as $skill)
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="font-semibold text-sm">{{ $skill->name }}</span>
                                    <span class="text-sm font-bold gradient-text">{{ $skill->level }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2.5 overflow-hidden">
                                    <div class="gradient-bg h-2.5 rounded-full transition-all duration-1000" style="width: {{ $skill->level }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FEATURED PROJECTS -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Portofolio</span>
            <h2 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Featured <span class="gradient-text">Projects</span></h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Beberapa karya terbaik yang pernah saya kerjakan.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($featuredProjects as $project)
                <a href="{{ route('projects.show', $project) }}" class="group bg-white dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-lg card-hover block">
                    <div class="relative h-52 overflow-hidden">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full gradient-bg flex items-center justify-center text-6xl opacity-80">💼</div>
                        @endif
                        <div class="absolute top-3 right-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-brand-600 dark:text-brand-400">Featured</div>
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
                <p class="col-span-3 text-center text-gray-500 dark:text-gray-400">Belum ada project featured.</p>
            @endforelse
        </div>

        @if($featuredProjects->count() > 0)
            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold border-2 border-gray-200 dark:border-gray-700 hover:border-brand-500 dark:hover:border-brand-400 hover:text-brand-600 dark:hover:text-brand-400 transition-all">
                    Lihat Semua Project
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        @endif
    </div>
</section>

@endsection