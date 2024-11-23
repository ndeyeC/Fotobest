@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Connexion</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
@endsection
