<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('portfolio/Home');
    }

    public function downloadCV()
    {
        $path = storage_path('app/public/cv.pdf');
        
        if (!file_exists($path)) {
            abort(404, 'CV non disponible');
        }

        return response()->download($path, 'CV-Ibrahima-Diaw-Dieng.pdf');
    }
}