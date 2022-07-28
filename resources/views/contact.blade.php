<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Contato - Hill</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/contact.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">

    </head>
    <body>
    
        @include('layouts.header')

        <main class="contact">
          
            <h1>Deixe sua mensagem, feedback ou pergunta</h1>
            
            <form method="POST" action="/contact/send-feedback">

                @csrf

                <div class="email-control"> 
                    <label for="email">Seu email</label>
                    <input type="email" name="email" id="email" placeholder="Escreva seu email" />
                </div>

                <div class="message-control">
                    <textarea name="message" rows="8" placeholder="Deixe sua mensagem"></textarea>
                    <button type="submit">Enviar</button>
                </div>
               
                @if (session("message"))
                    <div class="message-response">
                        <p>{{ session("message") }}</p>
                    </div>
                @endif

            </form>

        </main>

        @include('layouts.footer')

    </body>
</html>
