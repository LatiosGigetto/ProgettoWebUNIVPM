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
    <link rel="stylesheet" href="css/style.css">
        <style>
            .row {
                display: flex;
                justify-content: center;
            }

            .center {
                text-align: center;
            }

            .testoconlink  {
                margin-top: auto;
            }

            .testosenzalink {
                margin-top: auto;
            }
            .bottoni {
                margin-bottom: auto
            }
            .logosito {
                width: 40%;
                height: 40%;
            }

        </style>

</head>

<body>
@section('content')

    <div class="riquadro2">
        <div class="row">
            <div class="center">
                <h2>Acquisto Verificato</h2>
                <p> Il codice del tuo coupon è:
                <br>
                    XXX_XXX_XXX
                </p>
                <img class = logosito src="images/logosito.png" alt="Descrizione dell'immagine">

                <div class="testoconlink">
                    <a href="linkdaseguire">Coupon generato</a>
                </div>
                <br>
                <div class="testosenzalink">
                    <strong>Descrizione offerta</strong>
                </div>
                <br>
                <div class="bottoni">
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
