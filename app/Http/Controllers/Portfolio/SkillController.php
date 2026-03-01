<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Inertia\Inertia;

class SkillController extends Controller
{
    public function index()
    {
        // Grouper par catégorie
        $skills = Skill::orderBy('order')
            ->get()
            ->groupBy('category');

        return Inertia::render('portfolio/Skills', [
            'skills' => $skills,
        ]);
    }
}