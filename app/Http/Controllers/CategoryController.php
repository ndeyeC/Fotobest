<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'description' => 'nullable'
    ]);

    Category::create($validated);
    return redirect()->route('categories.index')->with('success', 'Catégorie créée');
}

public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|unique:categories,name,'.$category->id.'|max:255',
        'description' => 'nullable'
    ]);

    $category->update($validated);
    return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour');
}

public function destroy(Category $category)
{
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée');
}
}
