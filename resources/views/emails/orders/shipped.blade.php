@component('mail::message')
# Commande Expédiée

Votre commande a été expédiée.

**Numéro de Commande :** {{ $order->id }}

**Détails de la commande :**
@foreach($orderItems as $item)
- **Produit :** {{ $item->product->name }}
- **Quantité :** {{ $item->quantity }}
- **Prix :** {{ $item->price }}€
@endforeach

**Total :** {{ $order->total }}€

Merci,<br>
{{ config('app.name') }}
@endcomponent

