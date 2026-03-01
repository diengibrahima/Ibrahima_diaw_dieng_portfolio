<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'Pourquoi j\'ai choisi Laravel + Inertia.js pour mon portfolio',
                'excerpt'      => 'Retour d\'expérience sur le choix de cette stack moderne pour construire un portfolio performant et maintenable.',
                'content'      => 'Laravel et Inertia.js forment une combinaison puissante...',
                'tags'         => ['Laravel', 'Inertia.js', 'Vue.js'],
                'reading_time' => 5,
                'published'    => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'Flutter vs React Native : mon retour après 2 ans',
                'excerpt'      => 'Après avoir travaillé avec les deux frameworks, voici mon analyse honnête des forces et faiblesses de chacun.',
                'content'      => 'J\'ai eu l\'opportunité de travailler sur des projets Flutter et React Native...',
                'tags'         => ['Flutter', 'Mobile', 'Dart'],
                'reading_time' => 8,
                'published'    => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'Optimiser ses requêtes Eloquent avec Laravel',
                'excerpt'      => 'Les erreurs classiques avec Eloquent et comment les éviter pour des applications performantes.',
                'content'      => 'Le N+1 problem est l\'une des erreurs les plus courantes avec Eloquent...',
                'tags'         => ['Laravel', 'PHP', 'Performance'],
                'reading_time' => 6,
                'published'    => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}