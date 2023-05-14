<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

    @extends('header-footer')
    
<head>
    @section("title")
        Home
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <style>

        img {
            width: 50px;
            height: 50px;
            position: absolute;
        }

    </style>

</head>

<body>
@section('content')
    <div class="riquadro1">
        <h2 style="align-self: start">*contenuto introduttivo*</h2>
        <img src="images/logosito.png" alt="questo è il logo del nostro sito">
    </div>

    <div class="titolo">
        <strong>testo introduttivo del nostro sito</strong>
    </div>

    <div class="riquadro2">
        <div class="testo">
            <h3 style="margin-left: 10px">Offerte del giorno</h3>
        </div>
        <img src="images/logosito.png" alt="queste sono le offerte del giorno">
    </div>

</body>

@endsection
</html>
