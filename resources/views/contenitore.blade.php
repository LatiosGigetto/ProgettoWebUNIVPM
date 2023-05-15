
@extends("header-footer")

<head>
<link rel="stylesheet" href="css/contenitore.css">
</head>

<!-- Questo template funziona in maniera identica ad header-footer ma aggiunge   -->
<!-- un riquadro centrale con caratteristiche di stile predefinite da riempire   -->
<!-- con il contenuto definito nella pagina estesa nella section "contenuto".    -->


@section("content")             
<div id = "contenitore">
    @yield("contenuto")
</div>
@endsection