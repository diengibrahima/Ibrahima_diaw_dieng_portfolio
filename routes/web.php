<?php

use App\Http\Controllers\Portfolio\HomeController;
use App\Http\Controllers\Portfolio\ProjectController;
use App\Http\Controllers\Portfolio\SkillController;
use App\Http\Controllers\Portfolio\BlogController;
use App\Http\Controllers\Portfolio\ContactController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// ─── Portfolio Public ───────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/skills', [SkillController::class, 'index'])->name('skills');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/cv/download', [HomeController::class, 'downloadCV'])->name('cv.download');

// ─── Dashboard Privé ────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';