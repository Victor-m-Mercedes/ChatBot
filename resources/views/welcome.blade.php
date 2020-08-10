<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chatbot I.A - RD</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
        <link href="css/chatbot.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="logo">
                    <img src="https://i.pinimg.com/originals/0c/67/5a/0c675a8e1061478d2b7b21b330093444.gif" alt="Chatbot icon">
                </div>
            </div>
        </div>

        <script>
            var botmanWidget = {
                frameEndpoint: '/botman/chat',
                title: 'Chatbot - Troubleshooting',
                introMessage: 'Hola, soy Chatman y te brindaré mis servicios para resolver tus problemas con el sistema operativo. Para mas informacion escribe <b>opciones</b>. Esto fue hecho por Carlos Polanco (19-0728)',
                mainColor: '#CEDBDD'
            };
        </script>

        <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
        <!-- <script src="{{asset('js/widget.js')}}"></script> -->
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
        </script>

        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
        <script src="{{'js/chatbot.js'}}"></script>
    </body>
</html>