<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('portfolio/Contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: envoyer l'email (on le fera ensemble)

        return back()->with('success', 'Message envoyé avec succès !');
    }
}