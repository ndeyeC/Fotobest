@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Gestion des Catégories</h1>
        <a href="{{ route('categories.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Nouvelle Catégorie</a>
    </div>

    <div class="bg-white shadow-md rounded">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-3 px-4 text-left">Nom</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $category->name }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 mr-3">Modifier</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection