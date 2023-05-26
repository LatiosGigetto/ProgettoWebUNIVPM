@extends('layouts.header-footer')
<meta charset="UTF-8">
@section('title')
    Ciao, Staff!
@endsection
<link rel="stylesheet" href="css/style.css">
</head>
<body>
@section('content')
    <div class="profilo">
        <h2>Area riservata Staff ({{Auth::user()->username}})</h2>
        <a href="{{route("cambia-password")}}">Cambia password</a>
        <br>
        <a href="{{route("gestione-promozioni")}}">Gestione promozioni</a>
        <br>
        <a href="{{route("modifica-info")}}">Modifica informazioni personali</a>
    </div>

@endsection

