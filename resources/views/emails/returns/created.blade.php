@component('mail::message')
# Retour Créé

Votre demande de retour a été créée, {{ $return->order->user->name }}.

**Numéro de commande :** {{ $return->order->id }}

**Raison :** {{ $return->reason }}

@component('mail::button', ['url' => route('orders.show', $return->order->id)])
Voir la commande
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
