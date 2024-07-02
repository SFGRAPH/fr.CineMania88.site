@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Liste des retours</h1>

    <a href="{{ route('admin.returns.create') }}" class="btn btn-primary mb-3">Créer un retour</a>

    @if($returns->isEmpty())
        <p>Aucun retour trouvé.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Commande ID</th>
                    <th>Raison</th>
                    <th>Statut</th>
                    <th>Quantité retournée</th>
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
                            @foreach($return->products as $product)
                                {{ $product->pivot->quantity }} x {{ $product->name }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.returns.show', $return->id) }}" class="btn btn-info">Voir</a>
                            @if($return->status != 'approved' && $return->status != 'refunded')
                                <form action="{{ route('admin.returns.approve', $return->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approuver</button>
                                </form>
                                <form action="{{ route('admin.returns.reject', $return->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Rejeter</button>
                                </form>
                            @endif
                            @if($return->status == 'approved')
                                <form action="{{ route('admin.returns.refund', $return->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Rembourser</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection










