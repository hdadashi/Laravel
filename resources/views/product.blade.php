<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comprar {{ $product[0]->title }} - Hill</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/product.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">
    </head>

    <body>

        @include('layouts.header')

        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <main class="product-page">

            <section>

                <div class="thumb">
                    <img src="/images/products/{{ json_decode($product[0]->thumbs)->image1 }}" alt="Product Image"/>
                </div>

                <article>
                    <header>    
                        <h1>{{ $product[0]->title }}</h1>
                        <span>R${{ $product[0]->amount }}</span>
                    </header>

                    <p>{{ $product[0]->description }}</p>

                    <input type="hidden" value="{{ $preference->id }}" id="preferenceId"/>
                   
                    <div class="pay-container">
                        <a href="{{ $preference->init_point }}" target="_blank">Comprar</a>
                    </div>
                        
                </article>

            </section>

        </main>

        @include('layouts.footer')

    </body>
</html>
