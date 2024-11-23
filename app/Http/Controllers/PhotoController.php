<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Commentaire;

class PhotoController extends Controller
{
    public function index()
{
    $photos = Photo::with('category', 'user')->latest()->paginate(12);
    return view('photos.index', compact('photos'));
}

public function create()
{
    $categories = Category::all();
    return view('photos.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'titre' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'photo' => 'required|image|max:2048'
    ]);

    $path = $request->file('photo')->store('photos', 'public');

    $photo = Photo::create([
        'titre' => $validated['titre'],
        'category_id' => $validated['category_id'],
        'user_id' => auth()->id(),
        'chemin_fichier' => $path
    ]);

    return redirect()->route('photos.show', $photo)->with('success', 'Photo publiée');
}

 public function show(Photo $photo)
 {
     $commentaires = $photo->commentaires()->whereNull('parent_id')->with('reponses')->get();
     return view('photos.show', compact('photo', 'commentaires'));
}

// public function show($id)
// {
//     $photo = Photo::with('commentaires.reponses')->findOrFail($id);
//     return view('photos.show', compact('photo'));
// }


}
