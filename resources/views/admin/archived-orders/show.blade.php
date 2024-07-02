@extends('admin.layouts.app')

@section('title', 'Archived Order Details')

@section('content')
<div class="container">
    <h1>Archived Order Details</h1>

    <div class="card">
        <div class="card-header">
            Order #{{ $archivedOrder->id }}
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $archivedOrder->user->name }}</p>
            <p><strong>Status:</strong> {{ $archivedOrder->status }}</p>
            <p><strong>Total:</strong> {{ $archivedOrder->total }}</p>
            <p><strong>Completed At:</strong> {{ $archivedOrder->completed_at }}</p>
            <p><strong>Canceled At:</strong> {{ $archivedOrder->canceled_at }}</p>
            <p><strong>Order Created At:</strong> {{ $archivedOrder->created_at }}</p>
            <p><strong>Order Updated At:</strong> {{ $archivedOrder->updated_at }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Billing Address
        </div>
        <div class="card-body">
            @if ($archivedOrder->billingAddress)
                <p>{{ $archivedOrder->billingAddress->address }}</p>
                <p>{{ $archivedOrder->billingAddress->city }}, {{ $archivedOrder->billingAddress->state }} {{ $archivedOrder->billingAddress->postal_code }}</p>
                <p>{{ $archivedOrder->billingAddress->country }}</p>
            @else
                <p>No billing address provided.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Shipping Address
        </div>
        <div class="card-body">
            @if ($archivedOrder->shippingAddress)
                <p>{{ $archivedOrder->shippingAddress->address }}</p>
                <p>{{ $archivedOrder->shippingAddress->city }}, {{ $archivedOrder->shippingAddress->state }} {{ $archivedOrder->shippingAddress->postal_code }}</p>
                <p>{{ $archivedOrder->shippingAddress->country }}</p>
            @else
                <p>No shipping address provided.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Items
        </div>
        <div class="card-body">
            <table id="orderItems" class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivedOrder->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="{{ route('admin.archived-orders.index') }}" class="btn btn-primary">Retour</a>
@endsection


