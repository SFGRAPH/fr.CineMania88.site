@extends('layouts.app')

@section('title', 'Confirmation de Paiement')

@section('content')
<div class="container">
    <h1>Confirmer le Paiement</h1>
    <div id="payment-form"></div>
    <button id="pay-button" class="btn btn-primary">Payer</button>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#payment-form');

    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', async (e) => {
        e.preventDefault();
        const {error, paymentIntent} = await stripe.confirmCardPayment('{{ $clientSecret }}', {
            payment_method: {
                card: card,
                billing_details: {
                    name: '{{ Auth::user()->name }}',
                },
            }
        });

        if (error) {
            console.error(error);
        } else {
            window.location.href = '{{ route('checkout.success') }}';
        }
    });
</script>
@endsection
