@component('mail::message')
# Retour Rejeté

Votre demande de retour a été rejetée, {{ $return->order->user->name }}.

**Numéro de commande :** {{ $return->order->id }}

**Raison :** {{ $return->reason }}

@component('mail::button', ['url' => route('orders.show', $return->order->id)])
Voir la commande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

