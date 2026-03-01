<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->get(['id', 'title', 'slug', 'excerpt', 'tags', 'reading_time', 'published_at']);

        return Inertia::render('portfolio/blog/Index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        abort_if(!$post->published, 404);

        return Inertia::render('portfolio/blog/Show', [
            'post' => $post,
        ]);
    }
}