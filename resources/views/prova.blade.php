<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
        .stile_titolo_header{
            color:yellow;

    }
    </style>

</head>
    <body>
        <header>
            <!--chiamo la classe di bootstrap-->
            <!--expand lo estende per tutta la larghezza della pagine-->
                <nav style="background: purple">
                        <!--definisco un contenitore dove posizionare gli elementi centrati e con margin 2px-->

                        <div class="text-center mt-2">
                            <img src="images/longe.png" class="rounded"style="width: 100px" alt="longe">
                            <h1 class="stile_titolo_header">Doggo Discount</h1>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: flex-end">
                            <!--TODO sistemare i bottoni-->
                            <div id="1">
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">
                                        <a href="/catalogo">Catalogo Offerte</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/lista-aziende">Lista Aziende</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="2">
                            <p>Non sei registro(?).</p>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">
                                    <a href="/registrazione">Registrati</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/login">Login</a>
                                </li>
                            </ul>
                            </div>
                        </div>

                </nav>

        </header>
        <main>
            @yield('content')
        </main>

    <footer>
        <nav style="background: purple">
            <div style="display: flex; align-items: center; justify-content: space-between">
                <div>
                <img src="images/longe.png" class="rounded" style="width: 50px;" alt="longe">
                </div>
                <div style="text-align: center">
                    <b>Diritti</b>
                </div>
                <div style="text-align: center">
                    <a href="/contatti">Contatti</a>
                    <br>
                    <a href="/faq">Faq</a>
                </div>
            </div>
        </nav>
    </footer>
</body>
</html>
