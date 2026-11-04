<div class="space-y-5">
    <div>
        <label class="block mb-2 text-sm font-semibold">Nama Skill <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all"
            placeholder="Contoh: Laravel" required>
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">Level (0-100) <span class="text-red-500">*</span></label>
        <input type="number" name="level" min="0" max="100" value="{{ old('level', $skill->level ?? 50) }}"
            class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all" required>
        @error('level') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-semibold">Kategori <span class="text-red-500">*</span></label>
        <select name="category" class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all" required>
            <option value="programming" @selected(old('category', $skill->category ?? '') == 'programming')>Programming</option>
            <option value="frontend" @selected(old('category', $skill->category ?? '') == 'frontend')>Frontend</option>
            <option value="backend" @selected(old('category', $skill->category ?? '') == 'backend')>Backend</option>
            <option value="database" @selected(old('category', $skill->category ?? '') == 'database')>Database</option>
            <option value="tools" @selected(old('category', $skill->category ?? '') == 'tools')>Tools</option>
        </select>
        @error('category') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>