<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'level' => 90, 'category' => 'backend'],
            ['name' => 'PHP', 'level' => 90, 'category' => 'backend'],
            ['name' => 'MySQL', 'level' => 85, 'category' => 'database'],
            ['name' => 'JavaScript', 'level' => 85, 'category' => 'frontend'],
            ['name' => 'Vue.js', 'level' => 80, 'category' => 'frontend'],
            ['name' => 'Tailwind CSS', 'level' => 85, 'category' => 'frontend'],
            ['name' => 'Git', 'level' => 90, 'category' => 'tools'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}