<!DOCTYPE html>
<html>
    <head lang="eng">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>درباره ما</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/about.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">

    </head>
    <body>

        @include('layouts.header')

        <main class="about">
            <h1>درباره ما</h1>


            <section>

                <p>
                    &emsp; "ما بهترینیم!!!"
                </p>

                <p>
                    &emsp; "ما عالی هستیم!!!"
                </p>


            </section>

        </main>

        @include('layouts.footer')

    </body>
</html>
