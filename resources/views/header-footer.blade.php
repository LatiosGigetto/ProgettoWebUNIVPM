<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/style.css")}}">
        
        
        <title>@yield('title')</title>
        <!--TODO da sistemare lo stile-->
        <style>
            .stile_header_footer{
                color:yellow;
            }
            body{
                background-color: grey;
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
                    <a href="/home"><img src="{{asset("images/longe.png")}}" class="rounded" style="width: 100px" alt="longe"></a>
                    <h1 class="stile_header_footer">Doggo Discount</h1>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end">
                    <!--TODO sistemare i bottoni-->
                    <div >
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="/catalogo">Catalogo Offerte</a>
                            </li>
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="/lista-aziende">Lista Aziende </a>
                            </li>
                        </ul>
                    </div>
            @auth
                    <div>
                        <p style="text-align: right; margin-right: 10px">
                            <b>Benvenuto, {{Auth::user()->username}}.</b>
                        </p>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </li>
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="/login">Profilo</a>
                            </li>
                        </ul>
                    </div>
            @else
                    <div>
                        <b style="text-align: right">Non sei registrato.</b>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="/registrazione">Registrati</a>
                            </li>
                            <li class="list-group-item list-group-item-primary" style="background-color: transparent; border:transparent">
                                <a class="stile_header_footer" href="/login">Login</a>
                            </li>
                        </ul>
                    </div>
            @endif
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
                        <img src="{{asset("images/longe.png")}}" class="rounded" style="width: 50px;" alt="longe">
                    </div>
                    <div style="text-align: center">
                        <b class="stile_header_footer">Diritti</b>
                    </div>
                    <div style="text-align: center">
                        <a class="stile_header_footer" href="/contatti">Contatti</a>
                        <br>
                        <a class="stile_header_footer" href="/faq">Faq</a>
                    </div>
                </div>
            </nav>
        </footer>
    </body>
</html>
