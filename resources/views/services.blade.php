<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>خدمات</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/services.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">
    </head>
    <body>
    
        @include('layouts.header')

        <main class="services">
           
            <h2>خدمات</h1>

            <section>
             
                <h3>محصولات ما</h2>

                <p>
                    "!!!ما خیلی خوبیم"
                </p>

            </section>

            <section>
             
                <h3>خرید</h2>

                <p>
                    "!!!خیلی خوب"
                </p>
            
            </section>

        </main>

        @include('layouts.footer')

    </body>
</html>
