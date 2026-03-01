<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'E-commerce Platform',
                'description' => 'Application complète de vente en ligne avec gestion des stocks et paiements.',
                'long_description' => 'Une plateforme e-commerce fullstack avec panier, paiement Stripe, gestion des stocks en temps réel et tableau de bord admin.',
                'tags'        => ['Laravel', 'Vue.js', 'MySQL', 'Stripe'],
                'category'    => 'Web',
                'emoji'       => '🛒',
                'github_url'  => 'https://github.com',
                'live_url'    => 'https://demo.com',
                'featured'    => true,
                'order'       => 1,
            ],
            [
                'title'       => 'App de livraison',
                'description' => 'Application mobile de suivi de livraison en temps réel.',
                'long_description' => 'App Flutter avec géolocalisation, notifications push et suivi en temps réel via WebSockets.',
                'tags'        => ['Flutter', 'Dart', 'Laravel API', 'WebSocket'],
                'category'    => 'Mobile',
                'emoji'       => '📱',
                'github_url'  => 'https://github.com',
                'live_url'    => null,
                'featured'    => true,
                'order'       => 2,
            ],
            [
                'title'       => 'Dashboard Analytics',
                'description' => 'Tableau de bord d\'analyse de données avec graphiques interactifs.',
                'long_description' => 'Dashboard temps réel avec Chart.js, exports PDF/Excel et gestion des rôles utilisateurs.',
                'tags'        => ['Vue.js', 'PostgreSQL', 'Laravel', 'Chart.js'],
                'category'    => 'Web',
                'emoji'       => '📊',
                'github_url'  => 'https://github.com',
                'live_url'    => 'https://demo.com',
                'featured'    => true,
                'order'       => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}