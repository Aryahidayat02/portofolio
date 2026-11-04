<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'Platform e-commerce lengkap dengan sistem pembayaran, manajemen stok, dan dashboard admin.',
            'tech_stack' => 'Laravel, MySQL, Tailwind CSS',
            'demo_link' => 'https://demo.example.com',
            'github_link' => 'https://github.com/johndoe/ecommerce',
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => 'Aplikasi manajemen tugas dengan fitur kolaborasi tim dan notifikasi real-time.',
            'tech_stack' => 'Laravel, Vue.js, Pusher',
            'demo_link' => 'https://task.example.com',
            'github_link' => 'https://github.com/johndoe/taskapp',
            'is_featured' => true,
        ]);

        Project::create([
            'title' => 'Blog CMS',
            'description' => 'Content Management System untuk blog dengan editor WYSIWYG dan sistem komentar.',
            'tech_stack' => 'Laravel, Alpine.js',
            'github_link' => 'https://github.com/johndoe/blogcms',
            'is_featured' => false,
        ]);
    }
}