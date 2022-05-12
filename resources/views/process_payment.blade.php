<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processar pagamento - Hill eCommerce</title>

</head>

<body>
    <h1>Pagamento</h1>
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    @if ($method === 'ticket')
        <h1>Boleto</h1>

        <script src="{{ asset('/js/ticketProcessPayment.js') }}"></script>
    @endif

    @if ($method === 'credit-card')
        <h1>Cartão de crédito</h1>

        <form id="form-checkout">

            {{ csrf_field() }}

            <input type="text" name="cardNumber" id="form-checkout__cardNumber" />
            <input type="text" name="expirationDate" id="form-checkout__expirationDate" />
            <input type="text" name="cardholderName" id="form-checkout__cardholderName" />
            <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" />
            <input type="text" name="securityCode" id="form-checkout__securityCode" />
            <select name="issuer" id="form-checkout__issuer"></select>
            <select name="identificationType" id="form-checkout__identificationType"></select>
            <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" />
            <select name="installments" id="form-checkout__installments"></select>
            <button type="submit" id="form-checkout__submit">Pagar</button>
            <progress value="0" class="progress-bar">Carregando...</progress>
        </form>

        <script src="{{ asset('/js/creditCardProcessPayment.js') }}"></script>
    @endif

</body>

</html>
