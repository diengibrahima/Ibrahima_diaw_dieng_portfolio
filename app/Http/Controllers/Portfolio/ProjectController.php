<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')
            ->get(['id', 'title', 'slug', 'description', 'tags', 'category', 'emoji', 'github_url', 'live_url', 'featured']);

        return Inertia::render('portfolio/Projects', [
            'projects' => $projects,
        ]);
    }
}
