<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

@extends('header-footer')

<head>
    @section("title")
        Contatti
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
@section('content')

    <div class="titolo">
        <h1 style="text-align: center">Contatti</h1>
    </div>

    <div style="width: 70%; border:1px solid black;margin: auto">

        <div class="testo">
            <h3> Inforamazioni utili per contattare l'amministratore</h3>
        </div>

        <div class="contatti">
            <p>
                Amministratore: John Doe
                <br>
                Indirizzo:Via Tal del Tali 1,SpringField
                <br>
                Email:test@provider.com
                <br>
                Telefono:1234567890
            </p>
        </div>


    </div>


</body>

@endsection
</html>
