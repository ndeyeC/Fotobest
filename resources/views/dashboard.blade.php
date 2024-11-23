@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de Bord</h1>
    <p>Bienvenue sur votre tableau de bord, {{ Auth::user()->name }}!</p>

    <div class="stats">
        <h2>Statistiques</h2>
        <p>Photos publiées : {{ $photoCount }}</p>
        <p>Commentaires reçus : {{ $commentCount }}</p>
    </div>

    <div class="notifications">
        <h2>Notifications</h2>
        <!-- Code pour afficher les notifications -->
    </div>

    <div class="quick-links">
        <h2>Liens Rapides</h2>
        <a href="{{ route('photos.create') }}" class="btn btn-primary">Publier une Nouvelle Photo</a>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Gérer les Catégories</a>
    </div>
</div>
@endsection
