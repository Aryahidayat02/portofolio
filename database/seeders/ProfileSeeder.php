<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name' => 'John Doe',
            'title' => 'Full Stack Developer',
            'bio' => 'Saya adalah seorang developer berpengalaman dalam membangun aplikasi web modern dengan Laravel, Vue.js, dan React.',
            'email' => 'john@example.com',
            'phone' => '+62 812 3456 7890',
            'location' => 'Jakarta, Indonesia',
            'github' => 'https://github.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'instagram' => 'https://instagram.com/johndoe',
        ]);
    }
}