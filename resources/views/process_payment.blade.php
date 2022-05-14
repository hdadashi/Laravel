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

        @if ($method === "pix")
            <h1>Pix</h1>

            @csrf

            <button id="generatePixData">Gerar pagamento</button>

            <div class="qr_code"></div>

            <div id="copyPixCode">    
                <label for="copyPixCodeText">Copiar Hash:</label>
                <input type="text" value="" id="copyPixCodeText"/>
            </div>

            <script src="{{ asset('/js/generatePixData.js') }}"></script>

        @endif

    </body>

</html>
