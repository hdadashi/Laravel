<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bem vindo - Hill</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/welcome.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">
    </head>
    <body>

        @include('layouts.header') 

        <main class="core">

            <h1>Adicionados recentemente</h1>

            <section class="products">

                @if (count($products) < 1)

                    <h2>Não há produtos cadastrados</h2>

                @else

                    @foreach ($products as $product)

                        <a href="/product/{{ $product->id }}" class="products_link">
                            <article class="products_product-container">
                                <img src="/images/products/{{ json_decode($product->thumbs)->image1 }}"/>

                                <header>
                                    <h1>{{ $product->title }}</h1>
                                    <span>R${{ $product->amount }}</span>
                                </header>
                            </article>
                        </a>

                    @endforeach

                @endif

            </section>

            <h1>Mais vendidos</h1>

            <section class="products">

                @if (count($products) < 1)

                    <h2>Não há produtos cadastrados</h2>

                @else

                    @foreach ($products as $product)

                        <a href="/product/{{ $product->id }}" class="products_link">
                            <article class="products_product-container">
                                <img src="/images/products/{{ json_decode($products[0]->thumbs)->image1 }}"/>

                                <header>
                                    <h1>{{ $product->title }}</h1>
                                    <span>R${{ $product->amount }}</span>
                                </header>
                            </article>
                        </a>

                    @endforeach

                @endif

            </section>

            <h1>Destaques</h1>

            <section class="products">

                @if (count($products) < 1)

                    <h2>Não há produtos cadastrados</h2>

                @else

                    @foreach ($products as $product)

                        <a href="/product/{{ $product->id }}" class="products_link">
                            <article class="products_product-container">
                                <img src="/images/products/{{ json_decode($products[0]->thumbs)->image1 }}"/>

                                <header>
                                    <h1>{{ $product->title }}</h1>
                                    <span>R${{ $product->amount }}</span>
                                </header>
                            </article>
                        </a>

                    @endforeach

                @endif

            </section>

        </main>

        @include('layouts.footer')

    </body>
</html>
