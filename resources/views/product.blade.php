<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comprar {{ $product[0]->title }} - Hill eCommerce</title>
    </head>

    <body>

        @include('layouts.header')

        <main>

            <h1>Comprar produto</h1>

            <section>

                    <div>
                        <!-- IMAGE -->
                    </div>

                    <article>
                        <header>    
                            <h1>{{ $product[0]->title }}</h1>
                            <span>{{ $product[0]->amount }}</span>
                        </header>

                        <p>{{ $product[0]->description }}</p>
            
                        <a href="/process-payment/pix/{{ $product[0]->id }}">Comprar</a>
                    </article>

            </section>

        </main>

        @include('layouts.footer')

    </body>

</html>
