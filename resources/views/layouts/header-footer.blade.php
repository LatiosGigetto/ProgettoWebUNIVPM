<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset("css/style.css")}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

        @yield('link-scripts')

        <title>@yield('title')</title>
        <!--TODO da sistemare lo stile-->
        <style>
            .stile_header_footer{
                color:yellow;
            }
        </style>

    </head>
    <body style="background-color: white">
    <header style="background-color: #750C8E; border: 1px solid;">

        <div class="text-center mt-2">
            <a href="{{route('home')}}"><img src="{{asset("images/longe.png")}}" class="rounded" style="width: 100px" alt="longe"></a>
            <h1 class="h-f_color">Doggo Discount</h1>
        </div>

        <div class="container-fluid text-center">
            @auth
                <div class="row" style="text-align: right; min-width: 100%;">
                    <b>Benvenuto, {{ Auth::user()->username }}</b>
                </div>
            @else
            <div class="row" style="text-align: right; min-width: 100%;">
                <b>Non sei registrato.</b>
            </div>
            @endif

            <div class="row"  style="background-color: #A70BCD;">
                <div class="col-sm-auto">
                    <ul class="nav">
                        <li class="nav-item border border-black border-2 rounded-2" style="background-color: #750C8E;">
                            <a class="nav-link stile_header_footer" href="{{route('catalogo')}}">Catalogo Offerte</a>
                        </li>
                        <li class="nav-item border border-black border-2 rounded-2" style="background-color: #750C8E;">
                            <a class="nav-link stile_header_footer" href="{{route('lista-aziende')}}">Lista Aziende </a>
                        </li>
                    </ul>
                </div>
                <div class="col">

                </div>
                @auth
                <div class="col-sm-auto">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item border border-black border-2 rounded-2" style="background-color: #750C8E;">
                            <a class="nav-link stile_header_footer" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                        @can('isUser')
                        <li class="nav-item border border-black border-2 rounded-2 bg-primary">
                            <a class="nav-link stile_header_footer" href="{{route('profilo-cliente')}}">Profilo</a>
                        </li>
                        @endcan
                        @can('isStaff')
                            <li class="nav-item border border-black border-2 rounded-2 bg-primary">
                                <a class="nav-link stile_header_footer" href="{{route('staff')}}">Profilo</a>
                            </li>
                        @endcan
                        @can('isAdmin')
                            <li class="nav-item border border-black border-2 rounded-2 bg-primary">
                                <a class="nav-link stile_header_footer" href="{{route('admin')}}">Profilo</a>
                            </li>
                        @endcan
                    </ul>
                </div>
                @else
                <div class="col-sm-auto">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item border border-black border-2 rounded-2" style="background-color: #750C8E;">
                            <a class="nav-link stile_header_footer" href="{{route('registrazione')}}">Registrati</a>
                        </li>
                        <li class="nav-item border border-black border-2 rounded-2 bg-primary">
                            <a class="nav-link stile_header_footer" href="{{route('login')}}">Login</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </header>

    <main>
    @yield('content')
    </main>

    <footer>
        <div class="container-fluid" style="background-color: #750C8E;">
            <div class="row">
                <div class="col">
                    <img src="{{ asset("images/longe.png") }}" class="rounded" style="width: 50px;" alt="longe">
                </div>
                <div class="col text-center" style="align-self: center">
                    <div class="stile_header_footer">
                        <b>Diritti</b>
                    </div>
                </div>
                <div class="col text-end nav flex-column">
                    <a class="nav-link stile_header_footer p-0" href="{{route('contatti')}}" style="text-decoration: underline">Contatti</a>
                    <a class="nav-link stile_header_footer p-0" href="{{route('faq')}}" style="text-decoration: underline">Faq</a>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
