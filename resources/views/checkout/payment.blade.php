@extends('layouts.app')

@section('title', 'Payment')

<a class="logoLien" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" class="logoDashboard"></a>

@section('content')
<div class="container">
    <h1>Payment</h1>
    <div id="sumup-card"></div>
</div>


<script src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var paymentLink = '{{ $paymentLink }}';
        if (paymentLink) {
            SumUpCard.mount({
                id: 'sumup-card',
                checkoutId: paymentLink,
                onResponse: function (type, body) {
                    console.log('Type', type);
                    console.log('Body', body);
                    if (type === 'success') {
                        window.location.href = "{{ route('checkout.success') }}";
                    } else if (type === 'error') {
                        alert('Payment failed: ' + body.message);
                    }
                },
            });
        }
    });
</script>



@endsection

@section('scripts')

@endsection
