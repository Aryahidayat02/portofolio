<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio') | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            50:  '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'gradient': 'gradient 8s linear infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: 0, transform: 'translateY(20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                        float: {
                            '0%,100%': { transform: 'translateY(0)' },
                            '50%':     { transform: 'translateY(-15px)' },
                        },
                        gradient: {
                            '0%,100%': { backgroundPosition: '0% 50%' },
                            '50%':     { backgroundPosition: '100% 50%' },
                        },
                    },
                },
            },
        };

        // Dark mode init (hindari FOUC)
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .dark .glass {
            background: rgba(17,24,39,0.7);
        }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 8s linear infinite;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            background-size: 200% 200%;
            animation: gradient 8s linear infinite;
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.25);
        }
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #6366f1; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-100 min-h-screen transition-colors duration-300">

    <!-- Navbar -->
    <nav class="glass sticky top-0 z-50 border-b border-gray-200/50 dark:border-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-xl gradient-bg flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-brand-500/30 group-hover:scale-110 transition-transform">
                        P
                    </div>
                    <span class="text-xl font-bold">Portofolio</span>
                </a>

                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-50 dark:hover:bg-gray-800 hover:text-brand-600 dark:hover:text-brand-400 transition-colors {{ request()->routeIs('home') ? 'text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-gray-800' : '' }}">Home</a>
                    <a href="{{ route('projects.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-50 dark:hover:bg-gray-800 hover:text-brand-600 dark:hover:text-brand-400 transition-colors {{ request()->routeIs('projects.*') ? 'text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-gray-800' : '' }}">Projects</a>
                    <a href="{{ route('contact.create') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-50 dark:hover:bg-gray-800 hover:text-brand-600 dark:hover:text-brand-400 transition-colors {{ request()->routeIs('contact.*') ? 'text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-gray-800' : '' }}">Contact</a>
                </div>

                <div class="flex items-center gap-2">
                    <!-- Dark mode toggle -->
                    <button onclick="toggleTheme()" class="p-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" aria-label="Toggle dark mode">
                        <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </button>

                    @auth
                        <!-- Tombol ini HANYA muncul kalau lu udah login sebagai admin -->
                        <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-lg gradient-bg text-white text-sm font-semibold shadow-lg shadow-brand-500/30 hover:shadow-xl hover:shadow-brand-500/40 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2.5 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/30 hover:text-red-600 dark:hover:text-red-400 transition-colors" title="Logout">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash message -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 animate-fade-up">
            <div class="flex items-center gap-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-5 py-4 rounded-xl shadow-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="min-h-[calc(100vh-8rem)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-200 dark:border-gray-800 mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center text-white font-bold text-sm">P</div>
                    <span class="font-semibold">{{ config('app.name') }}</span>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">© {{ date('Y') }} Portfolio. Built with Laravel & Tailwind CSS.</p>
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center hover:bg-brand-100 dark:hover:bg-brand-900/50 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.theme = isDark ? 'dark' : 'light';
        }
    </script>
</body>
</html>