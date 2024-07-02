@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')
<div id="containerOrders">
    <h1>Commandes</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.orders.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher une commande...">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </span>
        </div>
    </form>

    @if($orders->isEmpty())
        <p>Pas de commande en cours...</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <!-- <th>Status</th> -->
                    <th>Total</th>
                    <th>Details</th>
                    <th>Update Status</th>
                    <th>Send Processing Email</th>
                    <th>Send Completed Email</th>
                    <th>Send Shipped Email</th>
                    <th>Cancel Order</th>
                    <th>Send Cancelled Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <!-- <td>{{ $order->status }}</td> -->
                        <td>{{ $order->total }}</td>
                        <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Détails</a></td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="status-form" data-order-id="{{ $order->id }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="status-select" data-order-id="{{ $order->id }}" onchange="this.form.submit()">
                                    <option value="received" {{ $order->status === 'received' ? 'selected' : '' }}>Reçu</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>En cours</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Complète</option>
                                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Expédiée</option>
                                    
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.sendProcessingEmail', $order) }}" method="POST">
                                @csrf
                                <button id="enCours" type="submit" class="btn btn-primary btn-processing" data-order-id="{{ $order->id }}" {{ $order->status !== 'processing' ? 'disabled' : '' }}>Notification en cours de traitement</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.sendCompletedEmail', $order) }}" method="POST">
                                @csrf
                                <button id="complete" type="submit" class="btn btn-primary btn-completed" data-order-id="{{ $order->id }}" {{ $order->status !== 'completed' ? 'disabled' : '' }}>Notification commande complète</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.sendShippedEmail', $order) }}" method="POST">
                                @csrf
                                <button id="expedie" type="submit" class="btn btn-primary btn-shipped" data-order-id="{{ $order->id }}" {{ $order->status !== 'shipped' ? 'disabled' : '' }}>Notification commande Expédiée</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.cancelOrder', $order) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Annuler la commande</button>
                            </form>
                        </td>
                        <td>
                            @if($order->status === 'cancelled')
                                <form action="{{ route('admin.orders.sendCancelledEmail', $order) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Notification d'annulation</button>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusSelects = document.querySelectorAll('.status-select');
        
        statusSelects.forEach(select => {
            select.addEventListener('change', function () {
                const orderId = this.dataset.orderId;
                const status = this.value;

                updateButtons(orderId, status);
            });

            updateButtons(select.dataset.orderId, select.value);
        });

        function updateButtons(orderId, status) {
            const processingBtn = document.querySelector(`.btn-processing[data-order-id="${orderId}"]`);
            const shippedBtn = document.querySelector(`.btn-shipped[data-order-id="${orderId}"]`);
            const completedBtn = document.querySelector(`.btn-completed[data-order-id="${orderId}"]`);

            if (processingBtn) processingBtn.disabled = status !== 'processing';
            if (shippedBtn) shippedBtn.disabled = status !== 'shipped';
            if (completedBtn) completedBtn.disabled = status !== 'completed';
        }
    });
</script>
@endsection














