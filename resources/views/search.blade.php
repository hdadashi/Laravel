<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Buscar produto - Hill</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/search.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">
    </head>
    <body>

        @include('layouts.header')

        <section class="search-wrapper">

            @if (session("products"))

                @foreach (session("products") as $product)

                    <a href="/product/{{ $product->id }}">
                        <article>
                            <div class="image">
                                <img src="/images/products/{{ json_decode($product->thumbs)->image1 }}" alt="Imagem produto"/>
                            </div>

                            <div class="info">
                                <nav>
                                    <h1>{{ $product->title }}</h1>
                                    <span>R${{ $product->amount }}</span>
                                </nav>

                                <p>{{ $product->description }}</p>
                            </div>
                        </article>
                    </a>

                @endforeach

            @else
                <h1 class="notfound-message">Produto não encontrado</h1>
            @endif

        </section>

        @include('layouts.footer')

    </body>
</html>
