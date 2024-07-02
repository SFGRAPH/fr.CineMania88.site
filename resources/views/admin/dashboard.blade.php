@extends('admin.layouts.app')

@section('content')

<div class="container" id="dashboardContainer">
    <h2>Tableau de Bord Admin</h2>
    @if (Auth::guard('admin')->check())
        <p>Bonjour, {{ Auth::guard('admin')->user()->username }} !</p>
    @endif

    <section class="mainContainer">

        <div class="menuLeft">
            <ul>
                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'superadmin')
                    <li><a href="{{ route('admin.create') }}" class="btn btn-primary">Ajouter un administrateur</a></li>
                @endif

                <li><a href="{{ route('admin.products.create') }}" class="btn btn-primary">Ajouter des produits</a></li>
                <li><a href="{{ route('admin.products.index') }}" class="btn btn-primary">Consulter les produits</a></li>

                <li><a href="{{ route('admin.events.index') }}" class="btn btn-primary">Consulter les Événements</a></li>

                <li><a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Gérer les Commandes</a></li>
                <li><a href="{{ route('admin.archived-orders.index') }}" class="btn btn-primary">Voir les commandes archivées</a></li>
                <li><a href="{{ route('admin.returns.index') }}" class="btn btn-primary">Gérer les retours</a></li>
                <li><a href="{{ route('admin.returns.archived') }}" class="btn btn-primary">Historique des retours</a></li>
            </ul>
        </div>

        <!-- Ajoutez ici le contenu du tableau de bord admin -->
        <div class="menuRight">
            <h3>Commandes reçues</h3>
            @if($receivedOrders->isEmpty())
                <p>Aucune commande reçue pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receivedOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->total }}</td>
                                <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Détails</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </section>

</div>
@endsection




