@component('mail::message')
# Retour Remboursé

Votre retour a été remboursé, {{ $return->order->user->name }}.

**Numéro de commande :** {{ $return->order->id }}

**Raison :** {{ $return->reason }}

@component('mail::button', ['url' => route('orders.show', $return->order->id)])
Voir la commande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

