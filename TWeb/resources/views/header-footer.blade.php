<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header style="background-color: #c603fc; position: relative">
        <div style="text-align: center">

            <img style="max-height: 10%; max-width: 10%" src="images/longe.png" alt="longe">
            <p>
                Il nostro sito
            </p>

        </div>
        <nav style="text-align: left; position: absolute; bottom: 5px">
            <ul style="display: flex; list-style-type: none">
                <li><a href="#">Lista offerte</a> <span style="padding: 5px">|</span> </li>
                <li><a href="#">Lista aziende</a></li>
            </ul>
        </nav>

        <nav style="text-align: right">
            @auth
            <p> Benvenuto, {{ Auth::user()->name }}</p>
            <ul style="display: inline-flex; list-style-type: none">
                <li><a href="#">Profilo</a> <span style="padding: 5px">|</span> </li>
                <li><a href="#">Logout</a></li>
            </ul>
            @else
            <p> Non sei autenticato</p>
            <ul style="display: inline-flex; list-style-type: none">
                <li><a href="#">Login</a> <span style="padding: 5px">|</span> </li>
                <li><a href="#">Registrazione</a></li>
            </ul>
            @endif
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="background-color: #c603fc; width: 100%">
        <nav style="width: 100%; margin: auto">
            <img style="max-height: 10%;max-width: 10%; padding: 10px" src="images/longe.png" alt="longe">
            <p style="text-align: center;">&copy; Copyright LOLOLOLOLOL</p>

            <!-- Per qualche motivo noto solo a Tim Berners Lee le ul in HTML hanno un padding naturale a sinistra di 16px. L'ho forzato a 0 e adesso
                la lista è centrata come dovrebbe essere. Grazie, John HTML.-->

            <ul style=" list-style-type: none;text-align: center; padding: 0px">
                <li><a href="#">Contatti</a> </li>
                <li><a href="#">Faq</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
