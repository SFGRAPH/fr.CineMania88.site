@extends('layouts.app')

@section('title', 'Caisse')

@section('content')
<div class="container mt-5">
    <h2>Caisse</h2>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <h3>Adresse de facturation</h3>
        <div class="form-group">
            <label for="billing_address">Adresse</label>
            <input type="text" class="form-control" id="billing_address" name="billing_address" required>
        </div>

        <div class="form-group mt-3">
            <label for="billing_city">Ville</label>
            <input type="text" class="form-control" id="billing_city" name="billing_city" required>
        </div>

        <div class="form-group mt-3">
            <label for="billing_postal_code">Code postal</label>
            <input type="text" class="form-control" id="billing_postal_code" name="billing_postal_code" required>
        </div>

        <div class="form-group mt-3">
            <label for="billing_department">Département</label>
            <input type="text" class="form-control" id="billing_department" name="billing_department">
        </div>

        <div class="form-group mt-3">
            <label for="billing_country">Pays</label>
            <input type="text" class="form-control" id="billing_country" name="billing_country" value="France" required>
        </div>

        <h3 class="mt-5">Adresse de livraison</h3>
        <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="same_as_billing" name="same_as_billing">
            <label class="form-check-label" for="same_as_billing">Identique à l'adresse de facturation</label>
        </div>

        <div id="shipping_address_fields">
            <div class="form-group mt-3">
                <label for="shipping_address">Adresse</label>
                <input type="text" class="form-control" id="shipping_address" name="shipping_address">
            </div>

            <div class="form-group mt-3">
                <label for="shipping_city">Ville</label>
                <input type="text" class="form-control" id="shipping_city" name="shipping_city">
            </div>

            <div class="form-group mt-3">
                <label for="shipping_postal_code">Code postal</label>
                <input type="text" class="form-control" id="shipping_postal_code" name="shipping_postal_code">
            </div>

            <div class="form-group mt-3">
                <label for="shipping_department">Département</label>
                <input type="text" class="form-control" id="shipping_department" name="shipping_department">
            </div>

            <div class="form-group mt-3">
                <label for="shipping_country">Pays</label>
                <input type="text" class="form-control" id="shipping_country" name="shipping_country" value="France">
            </div>
        </div>

        <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary">Valider la commande</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('same_as_billing').addEventListener('change', function () {
        const shippingFields = document.getElementById('shipping_address_fields');
        const billingAddress = document.getElementById('billing_address').value;
        const billingCity = document.getElementById('billing_city').value;
        const billingPostalCode = document.getElementById('billing_postal_code').value;
        const billingDepartment = document.getElementById('billing_department').value;
        const billingCountry = document.getElementById('billing_country').value;

        if (this.checked) {
            document.getElementById('shipping_address').value = billingAddress;
            document.getElementById('shipping_city').value = billingCity;
            document.getElementById('shipping_postal_code').value = billingPostalCode;
            document.getElementById('shipping_department').value = billingDepartment;
            document.getElementById('shipping_country').value = billingCountry;
            shippingFields.style.display = 'none';
        } else {
            document.getElementById('shipping_address').value = '';
            document.getElementById('shipping_city').value = '';
            document.getElementById('shipping_postal_code').value = '';
            document.getElementById('shipping_department').value = '';
            document.getElementById('shipping_country').value = 'France';
            shippingFields.style.display = 'block';
        }
    });
</script>
@endsection
