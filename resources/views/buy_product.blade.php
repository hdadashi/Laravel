<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar {{ $product[0]->title }} - Hill eCommerce</title>
</head>

<body>
    <h1>Comprar produto</h1>

    @if (isset($product))
        <div>
            <div>
                <h1>{{ $product[0]->title }}</h1>
                <p>{{ $product[0]->description }}</p>
                <span>{{ $product[0]->amount }}</span>
            </div>

            <div>
                <button id="showPaymentMethodsBtn">Comprar</button>

                <div id="paymentMethods">
                    <a href="/process-payment/credit-card/{{ $product[0]->id }}">Cartão</a>
                    <a href="/">Pix</a>
                    <a href="/process-payment/ticket/{{ $product[0]->id }}">Boleto</a>
                </div>
            </div>

        </div>
    @endif

    <script src="{{ asset('/js/togglePaymentMethods.js') }}"></script>
</body>

</html>
