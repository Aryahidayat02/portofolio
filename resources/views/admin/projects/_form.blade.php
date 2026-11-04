<div class="space-y-5">
    <div>
        <label class="block mb-2 text-sm font-semibold">Judul <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
            placeholder="Judul project" required>
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">Deskripsi <span class="text-red-500">*</span></label>
        <textarea name="description" rows="5"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all resize-none"
            placeholder="Ceritakan tentang project..." required>{{ old('description', $project->description ?? '') }}</textarea>
        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">Tech Stack <span class="text-red-500">*</span></label>
        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack ?? '') }}"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
            placeholder="Laravel, MySQL, Tailwind CSS" required>
        @error('tech_stack') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">GitHub Link</label>
        <input type="url" name="github_link" value="{{ old('github_link', $project->github_link ?? '') }}"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
            placeholder="https://github.com/username/repo">
        @error('github_link') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">Gambar Project</label>
        <input type="file" name="image" accept="image/*"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white file:font-semibold hover:file:bg-brand-700 file:cursor-pointer">
        @if(isset($project) && $project->image)
            <div class="mt-3">
                <img src="{{ Storage::url($project->image) }}" class="w-40 h-40 object-cover rounded-xl">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
            </div>
        @endif
        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="flex items-center gap-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))
                class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
            <div>
                <span class="font-semibold">Tampilkan sebagai Featured</span>
                <p class="text-xs text-gray-500 dark:text-gray-400">Project featured akan muncul di halaman Home.</p>
            </div>
        </label>
    </div>
</div>