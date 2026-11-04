@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center px-4 py-20">
    <div class="w-full max-w-md animate-fade-up">
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto rounded-2xl gradient-bg flex items-center justify-center text-white text-2xl font-bold shadow-xl shadow-brand-500/30 mb-4">P</div>
            <h1 class="text-3xl font-extrabold">Welcome Back</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Login untuk akses dashboard admin</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl shadow-brand-500/10 p-8 border border-gray-100 dark:border-gray-800">
            @csrf

            <div class="space-y-5">
                <div>
                    <label class="block mb-2 text-sm font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="" required autofocus>
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">Password</label>
                    <input type="password" name="password"
                        class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
                        placeholder="••••••••" required>
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-gray-600 dark:text-gray-400">Ingat saya</span>
                </label>

                <button type="submit" class="w-full gradient-bg text-white px-8 py-3.5 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:-translate-y-0.5 transition-all">
                    Login →
                </button>
            </div>
        </form>

        <p class="text-center mt-6 text-sm text-gray-500 dark:text-gray-400">
            <a href="{{ route('home') }}" class="hover:text-brand-600 dark:hover:text-brand-400">← Kembali ke Home</a>
        </p>
    </div>
</section>
@endsection