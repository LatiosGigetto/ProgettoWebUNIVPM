<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="it">

@extends('contenitore')

    <head>
    @section("title")
        Coupon
    @endsection
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>

@section('contenuto')


                <h2>Acquisto Verificato</h2>
                <p>Il codice del tuo coupon è:
                <br>
                    XXX_XXX_XXX
                </p>
                <img class = logosito src="images/logosito.png" alt="Descrizione dell'immagine">
                <a href="linkdaseguire">Coupon generato</a>
                <br>
                <strong>Descrizione offerta</strong>
                <br>
                <div>
                    <button name="genera" id="genera">
                        continua ad acquistare
                    </button>
                    <button name="indietro" id="indietro">
                        riepilogo acquisti
                    </button>
                </div>

@endsection
</html>
