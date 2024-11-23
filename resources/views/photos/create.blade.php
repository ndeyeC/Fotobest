@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl mb-6 text-center">Publier une photo</h1>
    
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="titre" class="block mb-2">Titre de la photo</label>
            <input type="text" name="titre" id="titre" class="w-full border rounded px-3 py-2" required>
        </div>
        
        <div class="mb-4">
            <label for="category_id" class="block mb-2">Catégorie</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="photo" class="block mb-2">Télécharger une photo</label>
            <input type="file" name="photo" id="photo" class="w-full border rounded px-3 py-2" required accept="image/*">
        </div>
        
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Publier</button>
    </form>
</div>
@endsection 