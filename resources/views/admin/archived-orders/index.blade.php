@extends('admin.layouts.app')

@section('title', 'Archived Orders')

@section('content')
    <div class="container">
        <h1>Commandes Archivées</h1>

        @if($archivedOrders->isEmpty())
            <p>Pas de commandes archivées...</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de l'utilisateur</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date de création</th>
                        <th>Date de mise à jour</th>
                        <th>Date de complétion</th>
                        <th>Date d'annulation</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivedOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td>{{ $order->completed_at }}</td>
                            <td>{{ $order->canceled_at }}</td>
                            <td>
                                <a href="{{ route('admin.archived-orders.show', $order) }}" class="btn btn-primary">Voir les détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


