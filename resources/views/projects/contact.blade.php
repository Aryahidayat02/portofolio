@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="max-w-2xl mx-auto px-4 py-16">
    <h1 class="text-4xl font-bold mb-8">Hubungi Saya</h1>
    <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-8">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Subjek</label>
            <input type="text" name="subject" value="{{ old('subject') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('subject') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 font-semibold">Pesan</label>
            <textarea name="message" rows="5" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ old('message') }}</textarea>
            @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 w-full">
            Kirim Pesan
        </button>
    </form>
</section>
@endsection