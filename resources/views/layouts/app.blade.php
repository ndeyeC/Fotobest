<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FotoBest</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])   

</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('photos.index') }}" class="text-2xl font-bold text-blue-600">FotoBest</a>
            <div class="space-x-4">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('categories.index') }}" class="text-gray-800">Catégories</a>
                    @endif
                     <a href="{{ route('photos.create') }}" class="text-gray-800">Publier Photo</a> 
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-800">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-800">Connexion</a>
                    <a href="{{ route('register') }}" class="text-gray-800">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
    

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>