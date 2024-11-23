<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'photo_id' => 'required|exists:photos,id',
        'parent_id' => 'nullable|exists:commentaires,id',
        'nom' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    Commentaire::create($validated);

    return back()->with('success', 'Commentaire ajouté');
}
}
