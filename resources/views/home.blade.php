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

</head>

<body>
@section('content')
    <div id="riquadro1">
        <h2 id="contenuto_introduttivo">*contenuto introduttivo*</h2>
        <img src="images/logosito.png" alt="questo è il logo del nostro sito" class="image_logo_2">
    </div>

    <div id="titolo">
        <strong>testo introduttivo del nostro sito</strong>
    </div>

    <div id="riquadro2">
        <h3 id="testo">Offerte del giorno</h3>
        <img src="images/logosito.png" alt="queste sono le offerte del giorno" class="image_logo_2">
    </div>
</body>
@endsection

</html>
