<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>ارتباط با ما</title>

        <link rel="stylesheet" href="{{ asset("/css/app.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/header.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/contact.css") }}" type="text/css">
        <link rel="stylesheet" href="{{ asset("/css/footer.css") }}" type="text/css">

    </head>
    <body>
    
        @include('layouts.header')

        <main class="contact">
          
            <h1>پیام، بازخورد یا سوال خود را بنویسید</h1>
            
            <form method="POST" action="/contact/send-feedback">

                @csrf

                <div class="email-control"> 
                    <label for="email">ایمیل شما</label>
                    <input type="email" name="email" id="email" placeholder="ایمیل خود را بنویسید" />
                </div>

                <div class="message-control">
                    <textarea name="message" rows="8" placeholder="پیغامتان را بگذارید"></textarea>
                    <button type="submit">ارسال</button>
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
