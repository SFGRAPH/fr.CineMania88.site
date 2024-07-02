<!-- resources/views/emails/orders/cancelled.blade.php -->

@component('mail::message')
# Commande Annulée

Votre commande #{{ $order->id }} a été annulée.

Merci,<br>
{{ config('app.name') }}
@endcomponent
