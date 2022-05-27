<!DOCTYPE html>
<html>
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
          
            <h1>Deixe sua mensagem</h1>
            
            <form method="POST">

                @csrf

                <div class="email-control"> 
                    <label for="email">Seu email:</label>
                    <input type="email" name="email" id="email"/>
                </div>

                <div class="message-control">
                    <textarea name="" id="" rows="8" placeholder="Deixe sua mensagem"></textarea>
                    <button type="submit">Enviar</button>
                </div>
                
            </form>

        </main>

        @include('layouts.footer')

    </body>
</html>
