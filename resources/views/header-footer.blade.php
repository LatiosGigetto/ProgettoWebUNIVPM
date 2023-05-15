<!DOCTYPE html>
<html lang="it">
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header-footer.css">
        
        <title>@yield('title')</title>

    </head>

    <body>
        <header class="header-footer">

            <div style="text-align: center">

                <a href="/home"><img class="logoheader"src="images/longe.png" alt="longe"></a>

                <p>Il nostro sito</p>

            </div>

            <div style='display: flex; align-items: flex-end'>
                <nav>
                    <ul style="display: inline-flex; list-style-type: none; padding: 5px">
                        <li><a href="/catalogo">Lista offerte</a> <span>|</span> </li>
                        <li><a href="/lista-aziende">Lista aziende</a></li>
                    </ul>
                </nav>

                <nav style="margin-right: 2%; margin-left: auto">
            @auth
                    <p> Benvenuto, {{ Auth::user()->name }}</p>
                    <ul class="authlist">
                        <li><a href="#">Profilo</a> <span>|</span> </li>
                        <li><a href="#">Logout</a></li>
                    </ul>
            @else
                    <p> Non sei autenticato</p>
                    <ul class="authlist">
                        <li><a href="/login">Login</a> <span>|</span> </li>
                        <li><a href="/registrazione">Registrazione</a></li>
                    </ul>
            @endif
                </nav>

            </div>
        </header>

        <main>
        @yield('content')
        </main>

        <!-- Esco sconfitto. Il diabolico CSS ha vinto. -->

        <footer class="header-footer">

            <p style="margin: auto">&copy; Copyright LOLOLOLOLOL</p>

            <ul class="contact-list">
                <li><a href="/contatti">Contatti</a> </li>
                <li><a href="/faq">FAQ</a></li>
            </ul>
        </footer>
    </body>
</html>
