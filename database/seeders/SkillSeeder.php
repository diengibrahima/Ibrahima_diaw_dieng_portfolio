<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Backend
            ['name' => 'Laravel',    'icon' => '🔴', 'category' => 'Backend',   'level' => 90, 'order' => 1],
            ['name' => 'PHP',        'icon' => '🐘', 'category' => 'Backend',   'level' => 88, 'order' => 2],
            ['name' => 'REST API',   'icon' => '🔌', 'category' => 'Backend',   'level' => 85, 'order' => 3],

            // Frontend
            ['name' => 'Vue.js',     'icon' => '💚', 'category' => 'Frontend',  'level' => 88, 'order' => 4],
            ['name' => 'TypeScript', 'icon' => '🔷', 'category' => 'Frontend',  'level' => 80, 'order' => 5],
            ['name' => 'Tailwind',   'icon' => '🎨', 'category' => 'Frontend',  'level' => 85, 'order' => 6],
            ['name' => 'Inertia.js', 'icon' => '⚡', 'category' => 'Frontend',  'level' => 82, 'order' => 7],

            // Mobile
            ['name' => 'Flutter',    'icon' => '📱', 'category' => 'Mobile',    'level' => 80, 'order' => 8],
            ['name' => 'Dart',       'icon' => '🎯', 'category' => 'Mobile',    'level' => 78, 'order' => 9],

            // Database
            ['name' => 'MySQL',      'icon' => '🗄️', 'category' => 'Database',  'level' => 85, 'order' => 10],
            ['name' => 'PostgreSQL', 'icon' => '🐘', 'category' => 'Database',  'level' => 80, 'order' => 11],

            // Tools
            ['name' => 'Git',        'icon' => '🌿', 'category' => 'Tools',     'level' => 88, 'order' => 12],
            ['name' => 'Docker',     'icon' => '🐳', 'category' => 'Tools',     'level' => 70, 'order' => 13],
            ['name' => 'Linux',      'icon' => '🐧', 'category' => 'Tools',     'level' => 75, 'order' => 14],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}