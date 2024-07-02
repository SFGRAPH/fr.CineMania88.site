@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Retours archivés</h1>

    @if($returns->isEmpty())
        <p>Aucun retour archivé trouvé.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Commande ID</th>
                    <th>Raison</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returns as $return)
                    <tr>
                        <td>{{ $return->id }}</td>
                        <td>{{ $return->order_id }}</td>
                        <td>{{ $return->reason }}</td>
                        <td>{{ $return->status }}</td>
                        <td>
                            <a href="{{ route('admin.returns.show', $return->id) }}" class="btn btn-info">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection



