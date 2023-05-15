<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

@extends('header-footer')

<head>
    @section("title")
        coupon_generato
    @endsection
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/coupon-generato.css">
    <link rel="stylesheet"


</head>

<body>
@section('content')

    <div id="contenitore_coupon_generato">
        <div class="contenuto"> <!-- ho definito class perchè lavora facendo ereditare le sue proprietà css a tutti i suoi figli-->
            <div>
                <h2>Acquisto Verificato</h2>
                <p> Il codice del tuo coupon è:
                <br>
                    XXX_XXX_XXX
                </p>
                <img class = logosito src="images/logosito.png" alt="Descrizione dell'immagine">
                <div>
                    <a href="linkdaseguire">Coupon generato</a>
                </div>
                <br>
                <div>
                    <strong>Descrizione offerta</strong>
                </div>
                <br>
                <div>
                    <button name="genera" id="genera">
                        continua ad acquistare
                    </button>
                    <button name="indietro" id="indietro">
                        riepilogo acquisti
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection
</html>
