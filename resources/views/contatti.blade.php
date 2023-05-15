<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">
<!--da rivedere: va centrato il blocco di testo-->
@extends('header-footer')

<head>
    @section("title")
        Contatti
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contatti.css">

</head>

<body>
@section('content')

    <div id="contenitore_contatti">
        <div id="contenuto">
            <h1 id="titolo_sezione">Contatti</h1>
            <h3> Informazioni utili per contattare l'amministratore</h3>
            <address id="contatti">
                <p>Amministratore: John Doe</p>
                <p>Indirizzo: Via Tal del Tali 1,SpringField</p>
                <p> Email: test@provider.com</p>
                <p>Telefono: 1234567890</p>
            </address>
        </div>
    </div>
</body>

@endsection
</html>
