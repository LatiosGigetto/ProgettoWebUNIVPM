<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    @yield('link-scripts')

    <title>@yield('title')</title>

</head>
<body>
<header>
    <div class="text-center mt-2">
        <a href="{{route('home')}}"><img src="{{asset("images/longe.png")}}" class="rounded" style="width: 100px"
                                         alt="longe"></a>
        <h1 class="h-f_color">Doggo Discount</h1>
    </div>

    <div class="container-fluid text-center">
        @auth
            <div class="row auth_message mx-0">
                <b>Benvenuto, {{ Auth::user()->username }}</b>
            </div>
        @else
            <div class="row auth_message mx-0">
                <b>Non sei registrato.</b>
            </div>
        @endif

        <div class="row py-2" id="inner_header">
            <div class="col-sm-auto">
                <ul class="nav">
                    <li class="nav-item rounded-2 header_btn mx-2">
                        <a class="nav-link h-f_color" href="{{route('catalogo')}}">Catalogo Offerte</a>
                    </li>
                    <li class="nav-item rounded-2 header_btn mx-2">
                        <a class="nav-link h-f_color" href="{{route('lista-aziende')}}">Lista Aziende </a>
                    </li>
                </ul>
            </div>
            <div class="col">

            </div>
            @auth
                <div class="col-sm-auto">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item rounded-2 header_btn mx-2">
                            <a class="nav-link h-f_color" href=""
                               onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                            <form id="logout" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">@csrf</form>
                        </li>
                        @can('isUser')
                            <li class="nav-item rounded-2 header_btn mx-2 bg-primary">
                                <a class="nav-link h-f_color" href="{{route('profilo-cliente')}}">Profilo</a>
                            </li>
                        @endcan
                        @can('isStaff')
                            <li class="nav-item rounded-2 header_btn mx-2 bg-primary">
                                <a class="nav-link h-f_color" href="{{route('staff')}}">Profilo</a>
                            </li>
                        @endcan
                        @can('isAdmin')
                            <li class="nav-item rounded-2 header_btn mx-2 bg-primary">
                                <a class="nav-link h-f_color" href="{{route('admin')}}">Profilo</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            @else
                <div class="col-sm-auto">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item rounded-2 header_btn mx-2">
                            <a class="nav-link h-f_color" href="{{route('registrazione')}}">Registrati</a>
                        </li>
                        <li class="nav-item rounded-2 header_btn mx-2 bg-primary">
                            <a class="nav-link h-f_color" href="{{route('login')}}">Login</a>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <img src="{{ asset("images/longe.png") }}" class="rounded" style="width: 50px;" alt="longe">
            </div>
            <div class="col text-center" style="align-self: center">
                <div class="h-f_color">
                    <b>Diritti</b>
                </div>
            </div>
            <div class="col text-end nav flex-column">
                <a class="nav-link h-f_color p-0" href="{{route('contatti')}}" style="text-decoration: underline">Contatti</a>
                <a class="nav-link h-f_color p-0" href="{{route('faq')}}" style="text-decoration: underline">Faq</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
