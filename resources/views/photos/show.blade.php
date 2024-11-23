

@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="{{ Storage::url($photo->chemin_fichier) }}" alt="{{ $photo->titre }}" class="w-full max-h-[600px] object-cover">
        
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-2">{{ $photo->titre }}</h1>
            <p class="text-gray-600">Catégorie: {{ $photo->category->name }}</p>
            <p class="text-gray-600">Publiée par: {{ $photo->user->name }}</p>
        </div>
    </div>

    <div class="mt-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl mb-4">Commentaires</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('commentaires.store', ['photo' => $photo->id]) }}" method="POST" class="mb-6">
            @csrf
            <input type="hidden" name="photo_id" value="{{ $photo->id }}">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="text" name="nom" placeholder="Votre nom" class="border rounded px-3 py-2" required>
                <input type="email" name="email" placeholder="Votre email" class="border rounded px-3 py-2" required>
            </div>

            <textarea name="message" placeholder="Votre commentaire" class="w-full border rounded px-3 py-2" required></textarea>

            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Envoyer</button>
        </form>

        @foreach($photo->commentaires as $commentaire)
            <div class="border-b pb-4 mb-4">
                <p class="font-bold">{{ $commentaire->nom }}</p>
                <p class="text-gray-600">{{ $commentaire->message }}</p>
                
                @foreach($commentaire->reponses as $reponse)
                    <div class="ml-6 mt-2 border-l-2 pl-4">
                        <p class="font-bold">{{ $reponse->nom }}</p>
                        <p class="text-gray-600">{{ $reponse->message }}</p>
                    </div>
                @endforeach
                
                <form action="{{ route('commentaires.store', ['photo' => $photo->id]) }}" method="POST" class="ml-6 mt-4">
                    @csrf
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <input type="hidden" name="parent_id" value="{{ $commentaire->id }}">

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="nom" placeholder="Votre nom" class="border rounded px-3 py-2" required>
                        <input type="email" name="email" placeholder="Votre email" class="border rounded px-3 py-2" required>
                    </div>

                    <textarea name="message" placeholder="Votre réponse" class="w-full border rounded px-3 py-2" required></textarea>

                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Répondre</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
