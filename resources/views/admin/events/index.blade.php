@extends('admin.layouts.app')

@section('content')
<div class="container" id="dashboardContainer">
            <h1>Liste des Événements</h1>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Créer un nouvel événement</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>
                                @if ($event->image_path)
                                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>            
@endsection
