@extends('layouts.app')

@section('title', 'Adresse')

<a class="logoLien" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logoDashboard"></a>

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="billing_address">Billing Address</label>
            <input type="text" class="form-control" id="billing_address" name="billing_address" required>
        </div>
        <div class="form-group">
            <label for="billing_city">Billing City</label>
            <input type="text" class="form-control" id="billing_city" name="billing_city" required>
        </div>
        <div class="form-group">
            <label for="billing_postal_code">Billing Postal Code</label>
            <input type="text" class="form-control" id="billing_postal_code" name="billing_postal_code" required>
        </div>
        <div class="form-group">
            <label for="billing_country">Billing Country</label>
            <input type="text" class="form-control" id="billing_country" name="billing_country" required>
        </div>
        <div class="form-group">
            <label for="same_as_billing">
                <input type="checkbox" id="same_as_billing" name="same_as_billing" value="1">
                Same as billing address
            </label>
        </div>
        <div id="shipping_address_fields">
            <div class="form-group">
                <label for="shipping_address">Shipping Address</label>
                <input type="text" class="form-control" id="shipping_address" name="shipping_address">
            </div>
            <div class="form-group">
                <label for="shipping_city">Shipping City</label>
                <input type="text" class="form-control" id="shipping_city" name="shipping_city">
            </div>
            <div class="form-group">
                <label for="shipping_postal_code">Shipping Postal Code</label>
                <input type="text" class="form-control" id="shipping_postal_code" name="shipping_postal_code">
            </div>
            <div class="form-group">
                <label for="shipping_country">Shipping Country</label>
                <input type="text" class="form-control" id="shipping_country" name="shipping_country">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<script>
    document.getElementById('same_as_billing').addEventListener('change', function () {
        var billingFields = {
            address: document.getElementById('billing_address').value,
            city: document.getElementById('billing_city').value,
            postalCode: document.getElementById('billing_postal_code').value,
            country: document.getElementById('billing_country').value
        };

        var shippingFields = document.getElementById('shipping_address_fields');
        
        if (this.checked) {
            document.getElementById('shipping_address').value = billingFields.address;
            document.getElementById('shipping_city').value = billingFields.city;
            document.getElementById('shipping_postal_code').value = billingFields.postalCode;
            document.getElementById('shipping_country').value = billingFields.country;
            shippingFields.style.display = 'none';
        } else {
            shippingFields.style.display = 'block';
        }
    });
</script>

@endsection


