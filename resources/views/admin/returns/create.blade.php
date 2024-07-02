@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Créer un retour</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.returns.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Commande</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Sélectionner une commande</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="reason">Raison</label>
            <input type="text" name="reason" id="reason" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <div class="form-group">
            <label for="products">Produits</label>
            <div id="products-container">
                <!-- Les produits seront chargés ici via JavaScript -->
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

<a href="{{ route('admin.returns.index') }}" class="btn btn-primary">Retour</a>

<script>
    document.getElementById('order_id').addEventListener('change', function() {
        var orderId = this.value;
        var productsContainer = document.getElementById('products-container');

        productsContainer.innerHTML = ''; // Clear previous products

        if (orderId) {
            fetch(`/admin/orders/${orderId}/products`)
                .then(response => response.json())
                .then(data => {
                    if (data.products.length === 0) {
                        productsContainer.innerHTML = '<p>Tous les produits de cette commande ont déjà été retournés.</p>';
                        return;
                    }

                    data.products.forEach(product => {
                        var productContainer = document.createElement('div');
                        productContainer.className = 'product-container';

                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = `products[${product.id}][id]`;
                        checkbox.value = product.id;
                        checkbox.id = `product_${product.id}`;

                        var label = document.createElement('label');
                        label.htmlFor = `product_${product.id}`;
                        label.appendChild(document.createTextNode(` ${product.name}`));

                        var quantityInput = document.createElement('input');
                        quantityInput.type = 'number';
                        quantityInput.name = `products[${product.id}][quantity]`;
                        quantityInput.min = 1;
                        quantityInput.max = product.remaining_quantity; // Max to the remaining quantity
                        quantityInput.value = product.remaining_quantity; // Default to the remaining quantity
                        quantityInput.className = 'form-control';
                        quantityInput.required = true;
                        quantityInput.disabled = true; // Initially disabled

                        checkbox.addEventListener('change', function() {
                            quantityInput.disabled = !this.checked; // Enable/disable quantity input based on checkbox state
                        });

                        productContainer.appendChild(checkbox);
                        productContainer.appendChild(label);
                        productContainer.appendChild(quantityInput);
                        productContainer.appendChild(document.createElement('br'));

                        productsContainer.appendChild(productContainer);
                    });
                });
        }
    });
</script>
@endsection




















