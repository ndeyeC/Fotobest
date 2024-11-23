@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($photos as $photo)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ Storage::url($photo->chemin_fichier) }}" alt="{{ $photo->titre }}" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $photo->titre }}</h2>
                <p class="text-gray-600">Catégorie: {{ $photo->category->name }}</p>
                <p class="text-gray-600">Par: {{ $photo->user->name }}</p>
                <a href="{{ route('photos.show', $photo) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded">Voir la photo</a>
            </div>
        </div>
    @endforeach
</div>

{{ $photos->links() }}
@endsection